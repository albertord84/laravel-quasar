<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
          $table->integer('id', true);

          $table->string('cep', 8)->nullable(false);
          $table->string('street', 100)->nullable(false);
          $table->string('number', 50)->nullable();
          $table->string('complement', 50)->nullable();
          $table->string('district', 50)->nullable(false);
          $table->string('city', 50)->nullable(false);
          $table->string('uf', 50)->nullable(false);

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
        Schema::dropIfExists('address');
    }
}
