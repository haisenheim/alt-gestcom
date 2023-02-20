<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('client_id')->default(0);
            $table->integer('fournisseur_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->smallInteger('status')->default(0);
            $table->dateTime('delivered_at')->nullable();
            $table->integer('delivered_by')->default(0);
            $table->dateTime('cancelled_at')->nullable();
            $table->integer('cancelled_by')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
