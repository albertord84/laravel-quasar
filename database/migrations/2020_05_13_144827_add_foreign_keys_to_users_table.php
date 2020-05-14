<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->foreign('company_id', 'fk_users_companies') //users x companies
                ->references('id')->on('companies')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('cost_center_id', 'fk_users_costs_centers') //users x costs_centers
                ->references('id')->on('costs_centers')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('address_id', 'fk_users_address') //users x address
                ->references('id')->on('address')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('role_id', 'fk_users_users_roles') //users x users_roles
                ->references('id')->on('users_roles')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('status_id', 'fk_users_users_status') //users x users_status
                ->references('id')->on('users_status')
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
        Schema::table('users', function (Blueprint $table) {
                $table->dropForeign('fk_users_companies');
                $table->dropForeign('fk_users_costs_centers');
                $table->dropForeign('fk_users_address');
                $table->dropForeign('fk_users_users_roles');
                $table->dropForeign('fk_users_users_status');
        });
    }
}
