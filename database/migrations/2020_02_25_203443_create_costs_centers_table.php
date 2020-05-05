<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostsCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs_centers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('company_id')->nullable(false); //fk
            $table->integer('admin_id')->nullable(false);  //fk

            $table->string('name', 100)->nullable(false);

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
        Schema::dropIfExists('costs_centers');
    }
}
