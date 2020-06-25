<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallRequestTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_request_tables', function (Blueprint $table) {
            $table->id();
            $table->string('caller_name')->nullable();
            $table->string('caller_email');
            $table->string('call_total_time');
            $table->string('call_total_Costs');
            $table->string('payment');
            $table->string('suggested_time_one');
            $table->string('suggested_time_two');
            $table->string('suggested_time_three');
            $table->integer('id_journalist');
            $table->string('status');
            $table->string('approval_status');
            $table->text('message');
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
        Schema::dropIfExists('call_request_tables');
    }
}
