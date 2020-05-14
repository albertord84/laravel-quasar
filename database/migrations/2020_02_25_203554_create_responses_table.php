<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->integer('id', true);

            $table->integer('user_id')->nullable()->index('fk_responses_users');
            $table->integer('question_id')->nullable()->index('fk_responses_questions');
            $table->integer('campaign_id')->nullable()->index('fk_responses_campaigns');
            $table->integer('response_option_id')->nullable()->index('fk_responses_options_responses')->default(0);

            $table->string('discursive_text', 4000)->nullable();

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
        Schema::dropIfExists('responses');
    }
}
