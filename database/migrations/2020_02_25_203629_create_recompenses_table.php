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
            $table->bigIncrements('id');

            $table->integer('user_id')->nullable(false); //fk
            $table->integer('questionnaire_id')->nullable(false); //fk
            $table->integer('campaign_id')->nullable(false); //fk
            $table->float('value', 6, 2)->nullable(false);

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
