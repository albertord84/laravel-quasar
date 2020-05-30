<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->integer('id', true);

            $table->integer('plane_id')->nullable()->index('fk_questionnaires_planes');
            $table->integer('criator_id')->nullable()->index('fk_questionnaires_users_criator');
            $table->integer('updater_id')->nullable()->index('fk_questionnaires_users_updater');
            $table->integer('company_id')->nullable()->index('fk_questionnaires_companies');

            $table->string('name',200)->nullable();
            $table->string('description',300)->nullable();
            $table->string('observation',300)->nullable();
            $table->integer('released')->nullable();

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
        Schema::dropIfExists('questionnaires');
    }
}
