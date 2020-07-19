<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
        $table->integer('id', true);

        $table->integer('user_id')->nullable(false)->index('fk_invitations_users')->default(1);
        $table->integer('campaign_id')->nullable(false)->index('fk_invitations_campaigns')->default(1);
        $table->integer('status_id')->nullable(false)->index('fk_invitations_status')->default(1);
    //   $table->integer('accepted')->nullable(false)->default(0);

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
        Schema::dropIfExists('invitations');
    }
}
