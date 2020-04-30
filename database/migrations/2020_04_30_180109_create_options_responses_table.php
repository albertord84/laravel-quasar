<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options_responses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('question_id')->nullable(false); //fk

            $table->string('response',1000)->nullable(false);
            $table->integer('truth')->nullable(false)->default(0);


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
        Schema::dropIfExists('options_responses');
    }
}