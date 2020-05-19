<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
          $table->foreign('questionnaire_id', 'fk_questions_questionnaires') //questions x questionnaires
                ->references('id')->on('questionnaires')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('content_type_id', 'fk_questions_questions_types') //questions x questions_types
                ->references('id')->on('questions_types')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('response_type_id', 'fk_questions_responses_types') //questions x responses_types
                ->references('id')->on('responses_types')
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
        Schema::table('questions', function (Blueprint $table) {
              $table->dropForeign('fk_questions_questionnaires');
              $table->dropForeign('fk_questions_questions_types');
              $table->dropForeign('fk_questions_responses_types');
        });
    }
}
