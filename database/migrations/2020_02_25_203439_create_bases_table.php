<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bases', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('origin_id')->nullable(false)->default(1); //fk
            $table->integer('company_id')->nullable(false); //fk
            $table->integer('criator_id')->nullable(false); //fk

            $table->string('name',100)->nullable(false);
            $table->string('decription',300)->nullable();
            $table->string('json_data',5000)->nullable();

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
        Schema::dropIfExists('bases');
    }
}
