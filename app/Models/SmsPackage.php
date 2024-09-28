<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsPackage extends Model
{
    use HasFactory;

    // Définir les champs pouvant être remplis par assignation de masse
    protected $fillable = ['name', 'description', 'price', 'features', 'validity', 'support'];

    // Si les colonnes JSON ne sont pas définies comme des types de données JSON, utilisez un mutateur
    protected $casts = [
        'features' => 'array', // Indique que la colonne 'features' est de type array
    ];
}
