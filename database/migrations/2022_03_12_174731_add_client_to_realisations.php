<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientToRealisations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('realisations', function (Blueprint $table) {
            $table->string('client')->nullable();
            $table->text('presentation_client_fr')->nullable();
            $table->text('presentation_client_de')->nullable();
            $table->text('presentation_client_en')->nullable();
            $table->string('date_realisation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('realisations', function (Blueprint $table) {
            //
        });
    }
}
