<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('job_id');
            $table->unsignedInteger('read_type'); // 0 - unread, 1 - read
            $table->unsignedInteger('inbox_type'); // 0 - public, 1 - personal/private
            $table->text('msg');
            $table->integer('priority'); // 0 - normal, 1 - important/ star
            $table->string('job_owner');
            $table->string('user');
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
        Schema::dropIfExists('inboxes');
    }
}
