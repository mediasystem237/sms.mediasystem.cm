@extends('layouts.app')

@section('content')
<!-- Section Héro -->
@include('components.hero')


<!-- Reste du contenu -->
 
<div class="container mx-auto px-4 py-16">

 <!-- Section Nos Offres -->
 @include('components.offres')

 <!-- Section Cas d'utilisation du Bulk SMS Marketing par secteur d'activité -->
 @include('components.features-card')

   <!-- demonstration -->
   @include('components.cta')

   <!-- operateurs couverts -->
   @include('components.operateurs')

    <!-- comment ça marches -->
   <!--  @include('components.camarche') ->
 
    
   <!-- demonstration -->
    @include('components.video-demo')


   <!-- faq -->
    @include('components.faq')



  
    
 </div>
@endsection