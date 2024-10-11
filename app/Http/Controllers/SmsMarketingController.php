<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsMarketingController extends Controller
{
    public function index()
    {
        // Liste des villes
        $villes = [
            'Yaoundé', 'Douala', 'Garoua', 'Bamenda', 'Maroua', 'Nkongsamba', 'Bafoussam', 
            'Ngaoundéré', 'Bertoua', 'Loum', 'Kumba', 'Edéa', 'Kumbo', 'Foumban', 
            'Mbouda', 'Dschang', 'Limbé', 'Ebolowa', 'Kousséri', 'Guider', 'Meiganga', 
            'Yagoua', 'Mbalmayo', 'Bafang', 'Tiko', 'Bafia', 'Wum', 'Kribi', 'Buea', 
            'Sangmélima', 'Foumbot', 'Bangangté', 'Batouri', 'Banyo', 'Nkambé', 'Bali', 
            'Mbanga', 'Mokolo', 'Melong', 'Manjo', 'Garoua-Boulaï', 'Mora', 'Kaélé', 
            'Tibati', 'Ndop', 'Akonolinga', 'Eséka', 'Mamfé', 'Obala', 'Muyuka'
        ];

        // Définir les packages
        $packages = [
            [
                'name' => 'Pack Débutant',
                'price' => 15, 
                'sms_quantity' => '1 000 à 4 999 SMS',
                'sms_range' => [1000, 4999],
                'total_price' => 'À partir de 15 000 FCFA',
                'features' => [
                    'Accès à la plateforme de SMS marketing',
                    'Statistiques de base des campagnes',
                    'Support par email',
                    'Personnalisation des SMS'
                ],
                'link' => 'https://smspro.cm/pack-debutant',
                'cta' => 'Commencer maintenant',
                'icon' => '📱',
                'popular' => false
            ],
            [
                'name' => 'Pack Pro',
                'price' => 13, 
                'sms_quantity' => '5 000 à 9 999 SMS',
                'sms_range' => [5000, 9999],
                'total_price' => 'À partir de 65 000 FCFA',
                'features' => [
                    'Support prioritaire par téléphone et email',
                    'Statistiques avancées des campagnes',
                    'API d’intégration',
                    'Conseils pour optimiser vos campagnes'
                ],
                'link' => 'https://smspro.cm/pack-pro',
                'cta' => 'Choisir ce pack',
                'icon' => '🚀',
                'popular' => true
            ],
            [
                'name' => 'Pack Entreprise',
                'price' => 11.5, 
                'sms_quantity' => '10 000 SMS et plus',
                'sms_range' => [10000, null],
                'total_price' => 'À partir de 115 000 FCFA',
                'features' => [
                    'Support dédié 24/7',
                    'Tableau de bord personnalisé',
                    'Assistance à la configuration de la campagne',
                    'Accès à toutes les fonctionnalités avancées'
                ],
                'link' => 'https://smspro.cm/pack-entreprise',
                'cta' => 'choisir ce pack',
                'icon' => '🏢',
                'popular' => false
            ]
        ];

        // Définir les secteurs d'activité avec les cas d'utilisation
        $features = [
            [
                'icon' => '<svg class="text-brand-blue-600" width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'title' => "Secteur de la Vente au Détail",
                'description' => "Le Bulk SMS est un excellent moyen pour les détaillants de promouvoir leurs produits et de générer plus de trafic en magasin ou sur leur site web.",
                'use_cases' => [
                    "Envoyer des promotions et des offres spéciales à vos clients fidèles.",
                    "Notifier les clients des nouvelles collections ou des réductions exclusives.",
                    "Fournir des rappels de rendez-vous ou des alertes de disponibilité de produits."
                ]
            ],
            [
                'icon' => '<svg class="text-brand-blue-600" width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'title' => "Secteur de la Santé",
                'description' => "Le secteur de la santé utilise de plus en plus le SMS pour informer les patients et améliorer les communications médicales.",
                'use_cases' => [
                    "Envoyer des rappels de rendez-vous automatiques.",
                    "Notifier les patients des résultats de tests ou des renouvellements de prescriptions.",
                    "Fournir des informations de santé personnalisées ou des alertes."
                ]
            ],
            [
                'icon' => '<svg class="text-brand-blue-600" width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 20h8a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 8l4 4-4 4M15 8l-4 4 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'title' => "Secteur de l'Éducation",
                'description' => "Les établissements éducatifs utilisent le Bulk SMS pour garder les étudiants et les parents informés de manière instantanée.",
                'use_cases' => [
                    "Envoyer des rappels d'événements scolaires ou des dates importantes.",
                    "Notifier les parents et les élèves en cas d'urgence ou de fermeture d'établissement.",
                    "Communiquer les résultats académiques et les mises à jour importantes."
                ]
            ]
        ];

        // Envoyer les packages, villes et fonctionnalités à la vue 'pages.home'
        return view('pages.home', compact('villes', 'packages', 'features'));
    }
}
