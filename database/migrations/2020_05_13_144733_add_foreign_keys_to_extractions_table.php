<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToExtractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('extractions', function (Blueprint $table) {
          $table->foreign('status_id', 'fk_extractions_extractions_status') //extractions x extractions_status
                ->references('id')->on('extractions_status')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
          $table->foreign('user_id', 'fk_extractions_users') //extractions x users
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
        Schema::table('extractions', function (Blueprint $table) {
              $table->dropForeign('fk_extractions_extractions_status');
              $table->dropForeign('fk_extractions_users');
        });
    }
}
