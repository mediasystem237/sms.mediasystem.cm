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
        // Valider les données entrantes
        $request->validate([
            'sms_quantity' => 'required|integer|min:1000',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
        ]);
    
        $smsQuantity = $request->sms_quantity;
    
        // Définir les packages (les mêmes que dans SmsMarketingController)
        $packages = [
            [
                'name' => 'Pack Débutant',
                'price' => 15,
                'sms_range' => [1000, 4999],
            ],
            [
                'name' => 'Pack Pro',
                'price' => 13.5,
                'sms_range' => [5000, 9999],
            ],
            [
                'name' => 'Pack Entreprise',
                'price' => 12,
                'sms_range' => [10000, null],
            ]
        ];
    
        // Rechercher le package correspondant
        $pricePerSms = null;
        foreach ($packages as $package) {
            [$min, $max] = $package['sms_range'];
            if ($smsQuantity >= $min && ($max === null || $smsQuantity <= $max)) {
                $pricePerSms = $package['price'];
                break;
            }
        }
    
        // Vérifier si aucun package ne correspond
        if ($pricePerSms === null) {
            return back()->with('error', 'Aucun package ne correspond à cette quantité.');
        }
    
        // Calculer le montant total
        $amount = $smsQuantity * $pricePerSms;
    
        // Informations pour la transaction
        $email = 'user@example.com';  // L'email de l'utilisateur (à remplacer dynamiquement si nécessaire)
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
                    'sms_quantity' => $smsQuantity,
                ],
                'description' => "Paiement pour l'achat de {$smsQuantity} SMS",
            ]);
    
            // Rediriger vers la page de paiement
            return redirect($transaction->authorization_url);
    
        } catch (\NotchPay\Exceptions\ApiException $e) {
            // Gérer les erreurs de paiement
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
