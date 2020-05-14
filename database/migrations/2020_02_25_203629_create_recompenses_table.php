<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecompensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recompenses', function (Blueprint $table) {
            $table->integer('id', true);

            $table->integer('user_id')->nullable()->index('fk_recompenses_users');
            $table->integer('questionnaire_id')->nullable()->index('fk_recompenses_questionnaires');
            $table->integer('campaign_id')->nullable()->index('fk_recompenses_campaigns');
            $table->float('value', 6, 2)->nullable(false);

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recompenses');
    }
}
