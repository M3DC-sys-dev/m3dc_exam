<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('crnt_date');
            $table->string('todohuken', 50);
            $table->string('fname', 10);
            $table->string('lname', 15);
            $table->integer('viewcnt');
            $table->string('ip_addr', 30);
            $table->string('referer', 200);
            $table->string('usr_agent', 200);
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
        Schema::dropIfExists('exam_logs');
    }
}
