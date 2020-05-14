<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responses', function (Blueprint $table) {
          $table->foreign('user_id', 'fk_responses_users') //responses x users
                ->references('id')->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('question_id', 'fk_responses_questions') //responses x questions
                ->references('id')->on('questions')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('campaign_id', 'fk_responses_campaigns') //responses x campaigns
                ->references('id')->on('campaigns')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('response_option_id', 'fk_responses_options_responses') //responses x options_responses
                ->references('id')->on('options_responses')
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
        Schema::table('responses', function (Blueprint $table) {
              $table->dropForeign('fk_recompenses_users');
              $table->dropForeign('fk_responses_questions');
              $table->dropForeign('fk_recompenses_campaigns');
              $table->dropForeign('fk_responses_options_responses');
        });
    }
}
