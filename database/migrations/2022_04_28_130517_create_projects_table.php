<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->string('is_publish',10)->nullable();
            $table->string('is_top',10)->nullable();
            $table->integer('goal')->nullable();
            $table->integer('raised')->nullable();
            $table->string('location',30);
            $table->string('title',300)->nullable();
            $table->date('date');
            $table->text('story');
            $table->text('cause');
            $table->text('feature_image');
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
        Schema::dropIfExists('projects');
    }
}
