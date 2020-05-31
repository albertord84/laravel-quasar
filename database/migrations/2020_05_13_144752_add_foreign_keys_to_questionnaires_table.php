<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaires', function (Blueprint $table) {
          $table->foreign('plane_id', 'fk_questionnaires_planes') //questionnaires x planes
                ->references('id')->on('planes')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('criator_id', 'fk_questionnaires_users_criator') //questionnaires x users
                ->references('id')->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('updater_id', 'fk_questionnaires_users_updater') //questionnaires x users
                ->references('id')->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('company_id', 'fk_questionnaires_companies') //questionnaires x companies
                ->references('id')->on('companies')
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
        Schema::table('questionnaires', function (Blueprint $table) {
                $table->dropForeign('fk_questionnaires_planes');
                $table->dropForeign('fk_questionnaires_users_criator');
                $table->dropForeign('fk_questionnaires_users_updater');
                $table->dropForeign('fk_questionnaires_companies');
        });
    }
}
