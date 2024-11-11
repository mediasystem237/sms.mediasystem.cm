<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NotchPay\NotchPay;
use NotchPay\Payment;

class PaymentController extends Controller
{
    /**
     * Initialiser le processus de paiement.
     */
    public function initializePayment(Request $request)
    {
        $amount = $request->sms_quantity * 10;  // Calculer le prix basé sur la quantité
        $email = 'user@example.com';  // L'email de l'utilisateur
        $currency = 'XAF';
        $reference = 'TX-' . uniqid();

        NotchPay::setApiKey(config('services.notchpay.secret'));

        try {
            // Initialiser la transaction NotchPay
            $transaction = Payment::initialize([
                'amount' => $amount,
                'email' => $email,
                'currency' => $currency,
                'callback' => env('NOTCHPAY_CALLBACK'),  // URL de callback depuis .env
                'reference' => $reference,
                'metadata' => [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'city' => $request->city,
                    'sms_quantity' => $request->sms_quantity,
                ],
                'description' => "Paiement pour l'achat de {$request->sms_quantity} SMS",
            ]);

            return redirect($transaction->authorization_url);  // Rediriger vers la page de paiement NotchPay
        } catch (\NotchPay\Exceptions\ApiException $e) {
            return back()->with('error', 'Erreur lors de l\'initialisation du paiement : ' . $e->getMessage());
        }
    }

    /**
     * Vérifier le paiement après le callback.
     */
    public function verifyPayment(Request $request)
    {
        $reference = $request->query('reference');
        if (!$reference) {
            return redirect()->route('home')->with('error', 'Référence de transaction manquante');
        }

        NotchPay::setApiKey(config('services.notchpay.secret'));

        try {
            // Vérifier la transaction via NotchPay
            $transaction = Payment::verify($reference);

            if (isset($transaction->transaction->status) && $transaction->transaction->status === 'complete') {
                $metadata = $transaction->transaction->metadata ?? null;

                if (!$metadata) {
                    return redirect()->route('home')->with('error', 'Les métadonnées de la transaction sont manquantes.');
                }

                // Rediriger vers la page de confirmation
                return redirect()->route('confirmation.page', [
                    'reference' => $transaction->transaction->reference,
                    'quantity' => $metadata->sms_quantity,
                    'amount' => $transaction->transaction->amount,
                    'name' => $metadata->name,
                ]);
            } else {
                return redirect()->route('home')->with('error', 'Le paiement a échoué.');
            }
        } catch (\NotchPay\Exceptions\ApiException $e) {
            return back()->with('error', 'Erreur lors de la vérification du paiement : ' . $e->getMessage());
        }
    }

    /**
     * Afficher la page de confirmation après le paiement.
     */
    public function showConfirmation(Request $request)
    {
        // Récupérer les détails de paiement à partir de la requête
        $reference = $request->query('reference');
        $quantity = $request->query('quantity');
        $amount = $request->query('amount');
        $name = $request->query('name');

        return view('pages.confirmation', compact('reference', 'quantity', 'amount', 'name'));
    }


    public function paymentFailed()
    {
        // Récupérer le message d'erreur
        $error = session('error', 'Une erreur est survenue lors du paiement. Veuillez réessayer.');

        // Retourner la vue de l'échec avec le message
        return view('pages.payment_failed', compact('error'));
    }

    public function generateInvoice($reference)
{
    // Récupérer les détails de la transaction avec la référence
    NotchPay::setApiKey(config('services.notchpay.secret'));
    
    try {
        $transaction = Payment::verify($reference);
        
        if ($transaction->transaction->status !== 'complete') {
            return redirect()->route('home')->with('error', 'Le paiement n\'a pas été effectué ou a échoué.');
        }

        $metadata = $transaction->transaction->metadata ?? null;

        $invoiceData = [
            'number' => 'PRO-MS' . date('ym') . '-' . rand(100, 999),
            'client' => $metadata->name,
            'total_amount' => $transaction->transaction->amount,
            'items' => [
                [
                    'description' => "Achat de {$metadata->sms_quantity} SMS",
                    'quantity' => $metadata->sms_quantity,
                    'unit_price' => $transaction->transaction->amount / $metadata->sms_quantity,
                    'total_price' => $transaction->transaction->amount,
                ]
            ]
        ];

        $pdf = PDF::loadView('invoices.invoice', $invoiceData);
        return $pdf->download('facture_' . $invoiceData['number'] . '.pdf');
    } catch (\NotchPay\Exceptions\ApiException $e) {
        return back()->with('error', 'Erreur lors de la génération de la facture : ' . $e->getMessage());
    }
}

}
