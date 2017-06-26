<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_id')->nullable();
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('category')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->text('instruction');
            $table->string('tags');
            $table->unsignedInteger('location')->nullable();
            $table->unsignedInteger('days_to_deliver')->nullable();
            $table->string('image_path');
            $table->string('url_link');
            $table->unsignedInteger('users')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
