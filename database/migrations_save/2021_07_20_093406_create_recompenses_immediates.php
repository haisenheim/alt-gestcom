<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecompensesImmediates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recompenses_immediates', function (Blueprint $table) {
            $table->id();
            $table->string('name',200)->nullable();
            $table->smallInteger('type')->default(0);
            $table->string('validity',100)->nullable();
            $table->date('echeance')->nullable();
            $table->integer('beneficiaires')->default(0);
            $table->double('roi')->nullable();
            $table->double('promotion')->default(0);
            $table->double('taux')->default(0);
            $table->integer('fournisseur_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->boolean('active')->default(true);
            $table->string('token')->nullable();
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
        Schema::dropIfExists('recompenses_immediates');
    }
}
