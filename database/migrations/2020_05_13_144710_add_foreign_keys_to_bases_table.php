<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bases', function (Blueprint $table) {
          $table->foreign('origin_id', 'fk_bases_bases_origins') //bases x bases_origins
                ->references('id')->on('bases_origins')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

          $table->foreign('company_id', 'fk_bases_companies') //bases x companies
                ->references('id')->on('companies')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

          // $table->foreign('criator_id', 'fk_bases_users') //bases x users
          //       ->references('id')->on('users')
          //       ->onUpdate('NO ACTION')
          //       ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bases', function (Blueprint $table) {
              $table->dropForeign('fk_users_accounts_banks');
              $table->dropForeign('fk_bases_companies');
              // $table->dropForeign('fk_bases_users');
        });
    }
}
