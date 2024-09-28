<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsMarketingController extends Controller
{
    public function index()
    {
        // Définir les packages
        $packages = [
            [
                'name' => 'Pack Débutant',
                'price' => 15, // Prix par SMS
                'sms_quantity' => '1 000 à 4 999 SMS',
                'total_price' => 'À partir de 15 000 FCFA', // Prix de départ
                'features' => [
                    'Accès à la plateforme de SMS marketing',
                    'Statistiques de base des campagnes',
                    'Support par email',
                    'Personnalisation des SMS'
                ],
                'link' => 'https://smspro.cm/pack-debutant',
                'cta' => 'Commencer maintenant',
                'icon' => '📱' // Exemple d’icône
            ],
            [
                'name' => 'Pack Pro',
                'price' => 13, // Prix par SMS
                'sms_quantity' => '5 000 à 9 999 SMS',
                'total_price' => 'À partir de 65 000 FCFA',
                'features' => [
                    'Support prioritaire par téléphone et email',
                    'Statistiques avancées des campagnes',
                    'API d’intégration (pour envoyer des SMS depuis votre application)',
                    'Conseils pour optimiser vos campagnes'
                ],
                'link' => 'https://smspro.cm/pack-pro',
                'cta' => 'Choisir ce pack',
                'icon' => '🚀' // Exemple d’icône
            ],
            [
                'name' => 'Pack Entreprise',
                'price' => 11.5, // Prix par SMS
                'sms_quantity' => '10 000 SMS et plus',
                'total_price' => 'À partir de 115 000 FCFA',
                'features' => [
                    'Support dédié 24/7',
                    'Tableau de bord personnalisé',
                    'Assistance à la configuration de la campagne',
                    'Accès à toutes les fonctionnalités avancées'
                ],
                'link' => 'https://smspro.cm/pack-entreprise',
                'cta' => 'Contacter un conseiller',
                'icon' => '🏢' // Exemple d’icône
            ]
        ];
        

        // Envoyer les packages à la vue 'pages.home'
        return view('pages.home', compact('packages'));
    }
}
