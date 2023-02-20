<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsCartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cartes', function (Blueprint $table) {
            //
            $table->integer('client_id')->default(0);
            $table->integer('fournisseur_id')->default(0);
            $table->double('montant')->default(0);
            $table->string('token',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cartes', function (Blueprint $table) {
            //
        });
    }
}
