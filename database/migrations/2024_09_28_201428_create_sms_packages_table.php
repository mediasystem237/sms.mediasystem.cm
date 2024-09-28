<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom du package
            $table->text('description')->nullable(); // Description du package
            $table->decimal('price', 8, 2)->nullable(); // Prix du package
            $table->json('features')->nullable(); // Caractéristiques du package sous forme de JSON
            $table->string('validity')->nullable(); // Validité de l'offre (ex. 1 mois, 1 an)
            $table->string('support')->nullable(); // Niveau de support (ex. Support email, Support prioritaire)
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_packages');
    }
}
