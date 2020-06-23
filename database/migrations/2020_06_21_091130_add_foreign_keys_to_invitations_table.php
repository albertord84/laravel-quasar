<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitations', function (Blueprint $table) {
          $table->foreign('user_id', 'fk_invitations_users') //invitations x users
              ->references('id')->on('users')
              ->onUpdate('NO ACTION')
              ->onDelete('NO ACTION');
          $table->foreign('campaign_id', 'fk_invitations_campaigns') //invitations x campaigns
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
        Schema::table('invitations', function (Blueprint $table) {
          $table->dropForeign('fk_invitations_users');
          $table->dropForeign('fk_invitations_campaigns');
        });
    }
}
