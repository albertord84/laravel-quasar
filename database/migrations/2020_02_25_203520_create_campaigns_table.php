<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('status_id')->nullable(false); //fk
            $table->integer('criator_id')->nullable(false); //fk
            $table->integer('updater_id')->nullable(); //fk
            $table->integer('questionary_id')->nullable(false); //fk
            $table->integer('base_id')->nullable(); //fk

            $table->string('name',200)->nullable(false);
            $table->string('objetive',300)->nullable();
            $table->string('description',300)->nullable();
            $table->string('observation',300)->nullable();

            $table->integer('response_limit')->nullable(false);
            $table->integer('response_amount')->nullable()->default(0);
            $table->integer('invitations_sent')->nullable()->default(0);
            $table->integer('invitations_accepted')->nullable()->default(0);
            $table->integer('invitations_declined')->nullable()->default(0);

            $table->timestamp('invitations_send_date')->nullable();
            $table->timestamp('requested_date')->nullable();
            $table->timestamp('analyzed_date')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();

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
        Schema::dropIfExists('campaigns');
    }
}
