<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallPaymentInfoTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_payment_info_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('call_id');
            $table->integer('amount');
            $table->string('card_last_four_digits');
            $table->string('expiry_month');
            $table->string('expiry_year');
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
        Schema::dropIfExists('call_payment_info_tables');
    }
}
