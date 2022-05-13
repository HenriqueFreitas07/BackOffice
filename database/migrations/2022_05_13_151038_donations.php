<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Donations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->date('date')->nullable();
            $table->interger('amount');
            $table->integer('id_user');
            $table->boolean('anonymous');
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();;
            $table->text('meta_keyword')->nullable();;
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
        //
        Schema::dropIfExists('donations');
    }
}
