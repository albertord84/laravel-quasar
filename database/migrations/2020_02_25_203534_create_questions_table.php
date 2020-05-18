<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->integer('id', true);

            $table->integer('questionnaire_id')->nullable()->index('fk_questions_questionnaires');
            $table->integer('content_type_id')->nullable()->index('fk_questions_questions_types');
            $table->integer('response_type_id')->nullable()->index('fk_questions_responses_types');

            $table->string('question',1000)->nullable(false);
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
        Schema::dropIfExists('questions');
    }
}
