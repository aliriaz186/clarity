<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('your_name')->nullable();
            $table->text('user_name')->nullable();
            $table->text('short_bio')->nullable();
            $table->text('mini_resume')->nullable();
            $table->text('email')->nullable();
            $table->text('cell_phone')->nullable();
            $table->text('your_location')->nullable();
            $table->text('your_timezone')->nullable();
            $table->text('profile_photo')->nullable();
            $table->text('hourly_rate')->nullable();
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
        Schema::dropIfExists('profile_tables');
    }
}
