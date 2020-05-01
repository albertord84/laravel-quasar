<?php

use App\Models\Responses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Responses Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('responses')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Responses:');

      $this->createResponsesOfQuestionnnaire1_ByTarget1();
      $this->createResponsesOfQuestionnnaire2_ByTarget1();
      $this->createResponsesOfQuestionnnaire3_ByTarget2();
    }

    public function createResponsesOfQuestionnnaire1_ByTarget1(){
      Responses::create([
          'id' => '1',
          'user_id' => '7',
          'question_id' => '1',
          'campaign_id' => '1',
          'response_option_id' => '1',
          'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 1');

      Responses::create([
          'id' => '2',
          'user_id' => '7',
          'question_id' => '2',
          'campaign_id' => '1',
          'response_option_id' => '',
          'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 2');

      Responses::create([
          'id' => '3',
          'user_id' => '7',
          'question_id' => '3',
          'campaign_id' => '1',
          'response_option_id' => '',
          'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 3');

      Responses::create([
          'id' => '4',
          'user_id' => '7',
          'question_id' => '4',
          'campaign_id' => '1',
          'response_option_id' => '',
          'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 4');
    }

    public function createResponsesOfQuestionnnaire2_ByTarget1(){

    }

    public function createResponsesOfQuestionnnaire3_ByTarget2(){

    }
}
