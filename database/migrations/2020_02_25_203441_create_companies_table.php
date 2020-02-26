<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('responsible_id')->nullable();// fk  ->index('fk_users_company');
            $table->integer('address_id')->nullable();// fk  ->index('fk_users_company');

            $table->string('social_reason', 300)->nullable(false);
            $table->string('fantasy_name', 100)->nullable(false);
            $table->string('cnpj', 20)->nullable(false);
            $table->string('phone', 20)->nullable();
            $table->string('phone2', 20)->nullable();
            $table->string('decription', 300)->nullable();
            $table->string('observation', 300)->nullable();

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
        Schema::dropIfExists('companies');
    }
}
