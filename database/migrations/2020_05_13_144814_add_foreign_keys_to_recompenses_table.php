<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRecompensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recompenses', function (Blueprint $table) {
          $table->foreign('user_id', 'fk_recompenses_users') //recompenses x users
                ->references('id')->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('questionnaire_id', 'fk_recompenses_questionnaires') //recompenses x questionnaires
                ->references('id')->on('questionnaires')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('campaign_id', 'fk_recompenses_campaigns') //recompenses x campaigns
                ->references('id')->on('campaigns')
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
        Schema::table('recompenses', function (Blueprint $table) {
              $table->dropForeign('fk_recompenses_users');
              $table->dropForeign('fk_recompenses_questionnaires');
              $table->dropForeign('fk_recompenses_campaigns');
        });
    }
}
