<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOptionsResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('options_responses', function (Blueprint $table) {
          $table->foreign('question_id', 'fk_options_responses_questions') //options_responses x questions
                ->references('id')->on('questions')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('options_responses', function (Blueprint $table) {
              $table->dropForeign('fk_options_responses_questions');
        });
    }
}
