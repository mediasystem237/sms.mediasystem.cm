@extends('layouts.app')

@section('content')
<!-- Section Héro -->
@include('components.hero')


<!-- Reste du contenu -->
<div class="container mx-auto px-4 py-16">
    <section class="mb-20">
        <h2 class="text-3xl font-bold text-brand-blue-600 mb-8">Pourquoi choisir notre service SMS Marketing ?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-brand-red-700">
                <h3 class="text-xl font-semibold text-brand-blue-600 mb-4">Taux d'ouverture élevé</h3>
                <p class="text-gray-700">98% des SMS sont lus dans les 3 minutes suivant leur réception.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-brand-red-700">
                <h3 class="text-xl font-semibold text-brand-blue-600 mb-4">Ciblage précis</h3>
                <p class="text-gray-700">Segmentez votre audience et envoyez des messages personnalisés.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-brand-red-700">
                <h3 class="text-xl font-semibold text-brand-blue-600 mb-4">Retour sur investissement élevé</h3>
                <p class="text-gray-700">Obtenez un ROI impressionnant grâce à des campagnes SMS ciblées.</p>
            </div>
        </div>
    </section>
     <!-- Section Nos Offres -->
     @include('components.features')
    
 <!-- Section Nos Offres -->
    @include('components.offres')

    <!-- comment ça marches -->
    @include('components.camarche')
 
    
   <!-- demonstration -->
    @include('components.video-demo')

    <!-- demonstration -->
    @include('components.cta')
    
 </div>
@endsection