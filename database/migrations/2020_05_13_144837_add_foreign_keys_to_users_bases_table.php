<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_bases', function (Blueprint $table) {
          $table->foreign('base_id', 'fk_users_bases_bases') //users_bases x bases
                ->references('id')->on('bases')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('user_id', 'fk_users_bases_users') //users_bases x users
                ->references('id')->on('users')
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
        Schema::table('users_bases', function (Blueprint $table) {
              $table->dropForeign('fk_users_bases_bases');
              $table->dropForeign('fk_users_bases_users');
        });
    }
}
