<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name',45)->nullable(false);
            $table->float('price', 6, 2)->nullable(false);
            $table->float('recompense', 6, 2)->nullable(false);
            $table->string('description', 300)->nullable();
            $table->integer('has_boolean_selection')->nullable(false)->default(1);
            $table->integer('has_unique_selection')->nullable(false)->default(1);
            $table->integer('has_multiple_selection')->nullable(false)->default(0);
            $table->integer('has_scale_response')->nullable(false)->default(0);
            $table->integer('has_discursive_response')->nullable(false)->default(0);
            $table->integer('has_image_content')->nullable(false)->default(0);
            $table->integer('has_video_content')->nullable(false)->default(0);
            $table->integer('has_link_content')->nullable(false)->default(0);

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
        Schema::dropIfExists('planes');
    }
}
