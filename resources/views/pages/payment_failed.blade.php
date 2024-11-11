@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Section principale du message d'erreur -->
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h3 class="mb-0">Paiement échoué</h3>
                </div>
                <div class="card-body">
                    <!-- Affichage du message d'erreur -->
                    <div class="alert alert-danger">
                        <strong>Une erreur est survenue lors du paiement.</strong>
                        <p>{{ $error }}</p>
                    </div>

                    <!-- Bouton pour revenir à l'accueil ou réessayer -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            Retour à la page d'accueil
                        </a>
                        <a href="{{ route('pay') }}" class="btn btn-warning">
                            Réessayer le paiement
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
