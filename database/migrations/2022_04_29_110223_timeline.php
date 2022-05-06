<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Timeline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('timeline', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->string('is_publish',10);
            $table->string('is_top',10);
            $table->string('title',300)->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->text('feature_image')->nullable();
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
    }
}
