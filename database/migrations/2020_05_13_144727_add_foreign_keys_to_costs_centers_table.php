<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCostsCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costs_centers', function (Blueprint $table) {
          $table->foreign('company_id', 'fk_costs_centers_companies') //costs_centers x companies
                ->references('id')->on('companies')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          // $table->foreign('admin_id', 'fk_costs_centers_users') //costs_centers x users
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
        Schema::table('costs_centers', function (Blueprint $table) {
              $table->dropForeign('fk_costs_centers_companies');
              // $table->dropForeign('fk_costs_centers_users');
        });
    }
}
