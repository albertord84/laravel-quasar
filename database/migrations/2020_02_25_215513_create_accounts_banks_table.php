<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts_banks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id')->nullable(false); //fk

            $table->string('bank',100)->nullable(false);
            $table->string('agency',30)->nullable(false);
            $table->string('account',30)->nullable(false);
            $table->string('account_type',100)->nullable();
            $table->string('dig',15)->nullable();
            $table->string('titular_name',150)->nullable(false);
            $table->string('titular_cpf',11)->nullable();

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
        Schema::dropIfExists('accounts_banks');
    }
}
