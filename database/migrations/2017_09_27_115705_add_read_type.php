<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReadType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_private_comments', function (Blueprint $table) {
            //
            $table->unsignedInteger('read_type')->after('job_transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_private_comments', function (Blueprint $table) {
            //
            $table->dropColumn('read_type');
        });
    }
}
