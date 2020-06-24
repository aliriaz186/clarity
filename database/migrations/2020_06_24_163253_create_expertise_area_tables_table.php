<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertiseAreaTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expertise_area_tables', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover_image');
            $table->string('category');
            $table->text('description')->nullable();
            $table->integer('id_user');
            $table->string('expertise_tags');
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
        Schema::dropIfExists('expertise_area_tables');
    }
}
