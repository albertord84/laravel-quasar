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

            $table->integer('company_id')->nullable()->index('fk_users_companies');
            $table->integer('cost_center_id')->nullable()->index('fk_users_costs_centers');
            $table->integer('address_id')->nullable()->index('fk_users_address');
            $table->integer('role_id')->nullable()->index('fk_users_users_roles');
            $table->integer('status_id')->nullable()->index('fk_users_users_status');

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
