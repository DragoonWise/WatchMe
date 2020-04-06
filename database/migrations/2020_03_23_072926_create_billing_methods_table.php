<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_methods', function (Blueprint $table) {
            $table->id();
            $table->string('type', 255);
            $table->string('plan_id', 255)->nullable();;
            $table->dateTime('start_time')->nullable();;
            $table->string('firstname', 255)->nullable();;
            $table->string('lastname', 255)->nullable();;
            $table->string('mail', 255)->nullable();;
            $table->string('creditcard_type', 255)->nullable();;
            $table->string('account', 255)->nullable();;
            $table->string('expdate', 255)->nullable();;
            $table->string('street', 255)->nullable();;
            $table->string('city', 255)->nullable();;
            $table->string('state', 255)->nullable();;
            $table->string('country_code', 2)->nullable();;
            $table->integer('zip')->nullable();;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_methods');
    }
}
