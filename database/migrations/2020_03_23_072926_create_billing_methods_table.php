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
            $table->string('plan_id', 255);
            $table->dateTime('start_time');
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->string('mail', 255);
            $table->string('creditcard_type', 255);
            $table->string('account', 255);
            $table->string('expdate', 255);
            $table->string('street', 255);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('country_code', 2);
            $table->integer('zip');
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->boolean('deleted')->default(0);
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
