<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_bases', function (Blueprint $table) {
            $table->integer('id', true);

            $table->integer('base_id')->nullable()->index('fk_users_bases_bases');
            $table->integer('user_id')->nullable()->index('fk_users_bases_users');

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
        Schema::dropIfExists('users_bases');
    }
}
