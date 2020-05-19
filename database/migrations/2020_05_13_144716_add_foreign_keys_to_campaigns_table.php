<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
          $table->foreign('status_id', 'fk_campaigns_campaigns_status') //campaigns x campaigns_status
                ->references('id')->on('campaigns_status')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('criator_id', 'fk_campaigns_users_criator') //campaigns x users
                ->references('id')->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('updater_id', 'fk_campaigns_users_updater') //campaigns x users
                ->references('id')->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('questionary_id', 'fk_campaigns_questionnaires') //campaigns x questionnaires
                ->references('id')->on('questionnaires')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('base_id', 'fk_campaigns_bases') //campaigns x bases
                ->references('id')->on('bases')
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
        Schema::table('campaigns', function (Blueprint $table) {
          $table->dropForeign('fk_campaigns_campaigns_status');
          $table->dropForeign('fk_campaigns_users_criator');
          $table->dropForeign('fk_campaigns_users_updater');
          $table->dropForeign('fk_campaigns_questionnaires');
          $table->dropForeign('fk_campaigns_bases');
        });
    }
}
