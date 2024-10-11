@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h2 class="text-2xl font-bold text-green-600 mb-4">Paiement Réussi !</h2>
        <p class="text-gray-700 mb-4">Merci, <strong>{{ $name }}</strong> ! Votre paiement a été effectué avec succès.</p>
        
        <div class="bg-gray-100 p-4 rounded mb-4">
            <ul class="text-left text-gray-700">
                <li><strong>Référence de transaction :</strong> {{ $reference }}</li>
                <li><strong>Package choisi :</strong> {{ $package }}</li>
                <li><strong>Quantité de SMS :</strong> {{ $quantity }}</li>
                <li><strong>Montant payé :</strong> {{ number_format($amount, 0, ',', ' ') }} FCFA</li>
            </ul>
        </div>
        
        <!-- Boutons de téléchargement et partage -->
        <div class="flex justify-center space-x-4">
            <!-- Bouton pour télécharger la facture en PDF -->
            <a href="{{ route('download.invoice', ['transaction' => $reference]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Télécharger la Facture
            </a>
            
            <!-- Bouton pour partager via WhatsApp -->
            <a href="https://wa.me/237673940405?text={{ urlencode("Paiement effectué avec succès !\n\nRéférence : $reference\nPackage : $package\nQuantité de SMS : $quantity\nMontant payé : " . number_format($amount, 0, ',', ' ') . " FCFA.") }}" 
               target="_blank" 
               class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Partager via WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection