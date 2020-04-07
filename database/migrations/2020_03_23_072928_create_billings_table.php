<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('paiement_type', 255);
            $table->string('ticket_number', 255)->nullable();
            $table->string('currency_code', 255)->nullable();
            $table->string('payment_status', 255)->nullable();
            $table->float('amount_ht')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('users_id')->constrained();
            $table->foreignId('billing_methods_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billings');
    }
}
