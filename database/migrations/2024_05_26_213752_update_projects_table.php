<!-- QUESTA è LA MIGRAZIONE CHE MI SERVE PER CREARE FOREIGN KEY -->

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
        Schema::table('projects', function (Blueprint $table) {
            //1.creo la colonna della foreignkey
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            //2. assegno la fk alla colonna creata
            $table->foreign('type_id')  //creo fk
                    ->references('id')  //riferimento a id
                    ->on('types')       //in types
                    ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //4. prima elimino fk
            $table->dropForeign(['type_id']);  //elimino in base al nome della colonna della fk

            //5. dopo si elimina la colonna
            $table->dropColumn('type_id');
        });
    }
};
