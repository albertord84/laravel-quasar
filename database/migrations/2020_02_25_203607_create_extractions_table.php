<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extractions', function (Blueprint $table) {
            $table->integer('id', true);

            $table->integer('status_id')->nullable()->index('fk_extractions_extractions_status');
            $table->integer('user_id')->nullable()->index('fk_extractions_users');

            $table->float('requested_value', 6, 2)->nullable(false);
            $table->float('payed_value', 6, 2)->nullable();

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
        Schema::dropIfExists('extractions');
    }
}
