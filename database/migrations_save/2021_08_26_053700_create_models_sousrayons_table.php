<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsSousrayonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sousrayons', function (Blueprint $table) {
            $table->id();
            $table->String('name',100)->nullable();
            $table->boolean('active')->default(true);
            $table->integer('rayon_id')->default(0);
            $table->integer('fournisseur_id')->default(0);
            $table->String('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models_sousrayons');
    }
}
