<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 100)->unique();
            $table->string('title', 100);
            $table->string('image')->nullable();
            $table->string('image_original_name')->nullable();
            // $table->string('type')->nullable();
              //importante per la seo e l'indicizzazione, stare attenti a dare un titolo che serva per la seo
            // $table->string('description', 500)->nullable();  //nullable() vuol dire che può non esserci //se voglio rimettere descriptio devo fare php artisan migrate:refresh

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
