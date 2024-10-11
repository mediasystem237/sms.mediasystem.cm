<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use NotchPay\NotchPay;
use NotchPay\Payment;

class PaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function initializePayment(Request $request)
{
    $amount = $request->amount;
    $email = $request->email;
    $currency = 'XAF';
    $reference = 'TX-' . uniqid();

    NotchPay::setApiKey(config('services.notchpay.secret'));

    try {
        $transaction = Payment::initialize([
            'amount' => $amount,
            'email' => $email,
            'currency' => $currency,
            'callback' => route('callback'),
            'reference' => $reference,
            'metadata' => [
                'name' => $request->name,
                'phone' => $request->phone,
                'city' => $request->city,
                'package_name' => $request->package_name,
                'sms_quantity' => $request->sms_quantity,
                'description' => "Achat de SMS marketing - {$request->package_name}",
            ],
            'description' => "Paiement pour {$request->sms_quantity} SMS via le package {$request->package_name}",
        ]);

        return redirect($transaction->authorization_url);
    } catch (\NotchPay\Exceptions\ApiException $e) {
        return back()->with('error', 'Erreur lors de l\'initialisation du paiement : ' . $e->getMessage());
    }
}

public function verifyPayment(Request $request)
{
    $reference = $request->query('reference');
    if (!$reference) {
        return redirect()->route('home')->with('error', 'Référence de transaction manquante');
    }

    NotchPay::setApiKey(config('services.notchpay.secret'));

    try {
        $transaction = Payment::verify($reference);

        if (isset($transaction->transaction->status) && $transaction->transaction->status === 'complete') {
            $metadata = $transaction->transaction->metadata ?? null;

            if (!$metadata) {
                return redirect()->route('home')->with('error', 'Les métadonnées de la transaction sont manquantes.');
            }

            return redirect()->route('confirmation.page', [
                'reference' => $transaction->transaction->reference,
                'package' => $metadata->package_name,
                'quantity' => $metadata->sms_quantity,
                'amount' => $transaction->transaction->amount
            ])->withoutMiddleware('auth');
            
        } else {
            return redirect()->route('home')->with('error', 'Le paiement a échoué.');
        }
    } catch (\NotchPay\Exceptions\ApiException $e) {
        return back()->with('error', 'Erreur lors de la vérification du paiement : ' . $e->getMessage());
    }
}

public function generateInvoice($transaction)
{
    $invoiceData = [
        'number' => 'PRO-MS' . date('ym') . '-' . rand(100, 999),
        'date' => date('d-m-Y'),
        'client' => $transaction['name'],
        'phone' => $transaction['phone'],
        'city' => $transaction['city'],
        'total_amount' => $transaction['amount'],
        'items' => [
            [
                'description' => $transaction['package'],
                'details' => ["Achat de {$transaction['quantity']} SMS marketing"],
                'quantity' => $transaction['quantity'],
                'unit_price' => $transaction['amount'] / $transaction['quantity'],
                'total_price' => $transaction['amount'],
            ]
        ]
    ];

    $pdf = PDF::loadView('invoices.a6_invoice', $invoiceData)->setPaper('a6');
    return $pdf->download('facture_' . $invoiceData['number'] . '.pdf');
}


public function showConfirmation(Request $request)
{
    // Extract payment details from the request
    $reference = $request->query('reference');
    $package = $request->query('package');
    $quantity = $request->query('quantity');
    $amount = $request->query('amount');
    
    // Pass the payment details to the view
    return view('pages.confirmation', compact('reference', 'package', 'quantity', 'amount'));
}


public function downloadInvoice($transaction)
{
    $invoiceData = [
        'number' => 'PRO-MS' . date('ym') . '-' . rand(100, 999),
        'date' => date('d-m-Y'),
        'client' => $transaction->transaction->metadata->name,
        'phone' => $transaction->transaction->metadata->phone,
        'city' => $transaction->transaction->metadata->city,
        'total_amount' => $transaction->transaction->amount,
        'items' => [
            [
                'description' => $transaction->transaction->metadata->package_name,
                'details' => ["Achat de {$transaction->transaction->metadata->sms_quantity} SMS marketing"],
                'quantity' => $transaction->transaction->metadata->sms_quantity,
                'unit_price' => $transaction->transaction->amount / $transaction->transaction->metadata->sms_quantity,
                'total_price' => $transaction->transaction->amount,
            ]
        ]
    ];

    $pdf = PDF::loadView('invoices.a6_invoice', $invoiceData)->setPaper('a6');

    return $pdf->download('facture_' . $invoiceData['number'] . '.pdf');
}



}
