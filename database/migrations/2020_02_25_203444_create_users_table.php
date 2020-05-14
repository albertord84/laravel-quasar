<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);

            $table->integer('company_id')->nullable(false)->default(0); //->index('fk_users_company');
            $table->integer('cost_center_id')->nullable(false)->default(0); //->index('fk_users_company');
            $table->integer('address_id')->nullable(false)->default(0); //->index('fk_users_company');
            $table->integer('role_id')->nullable(false)->default(3); //->index('fk_users_company');
            $table->integer('status_id')->nullable(false)->default(1); //->index('fk_users_company');

            $table->string('username', 150)->unique();
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            // $table->string('remember_token', 300)->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
