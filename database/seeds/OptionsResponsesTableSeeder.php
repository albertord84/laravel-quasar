<?php

use App\Models\OptionsResponses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate OptionsResponses  Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('options_responses')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating OptionsResponses :');

      $this->createOptionsResponsesForQuestion3();
      $this->createOptionsResponsesForQuestion4();
      $this->createOptionsResponsesForQuestion6();
      $this->createOptionsResponsesForQuestion7();
      $this->createOptionsResponsesForQuestion8();
      $this->createOptionsResponsesForQuestion10();
      $this->createOptionsResponsesForQuestion11();
      $this->createOptionsResponsesForQuestion12();
    }

    public function createOptionsResponsesForQuestion3 (){
      //UNIQUE_SELECTION
      OptionsResponses::create([
          'id' => '1',
          'question_id' => '3',
          'response' => 'Opção de resposta 1',
          'truth' => '0'
      ]);
      $this->command->info('OptionsResponse 1 for Question 3 criated');

      OptionsResponses::create([
          'id' => '2',
          'question_id' => '3',
          'response' => 'Opção de resposta 2',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 2 for Question 3 criated');

      OptionsResponses::create([
          'id' => '3',
          'question_id' => '3',
          'response' => 'Opção de resposta 3',
          'truth' => '0'
      ]);
      $this->command->info('OptionsResponse 3 for Question 3 criated');
    }

    public function createOptionsResponsesForQuestion4 (){
      //UNIQUE_SELECTION
      OptionsResponses::create([
          'id' => '4',
          'question_id' => '4',
          'response' => 'Opção de resposta 4-1',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 1 for Question 4 criated');

      OptionsResponses::create([
          'id' => '5',
          'question_id' => '4',
          'response' => 'Opção de resposta 4-2',
          'truth' => '0'
      ]);
      $this->command->info('OptionsResponse 2 for Question 4 criated');

      OptionsResponses::create([
          'id' => '6',
          'question_id' => '4',
          'response' => 'Opção de resposta 4-3',
          'truth' => '0'
      ]);
      $this->command->info('OptionsResponse 3 for Question 4 criated');
    }

    public function createOptionsResponsesForQuestion6 (){
      //UNIQUE_SELECTION
      OptionsResponses::create([
          'id' => '7',
          'question_id' => '6',
          'response' => 'Opção de resposta 6-1',
          'truth' => '0'
      ]);
      $this->command->info('OptionsResponse 1 for Question 6 criated');

      OptionsResponses::create([
          'id' => '8',
          'question_id' => '6',
          'response' => 'Opção de resposta 6-2',
          'truth' => '0'
      ]);
      $this->command->info('OptionsResponse 2 for Question 6 criated');

      OptionsResponses::create([
          'id' => '9',
          'question_id' => '6',
          'response' => 'Opção de resposta 6-3',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 3 for Question 6 criated');
    }

    public function createOptionsResponsesForQuestion7 (){
      //MULTIPLE_SELECTION
      OptionsResponses::create([
          'id' => '10',
          'question_id' => '7',
          'response' => 'Opção de resposta 7-1',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 1 for Question 7 criated');

      OptionsResponses::create([
          'id' => '11',
          'question_id' => '7',
          'response' => 'Opção de resposta 7-2',
          'truth' => '0'
      ]);
      $this->command->info('OptionsResponse 2 for Question 7 criated');

      OptionsResponses::create([
          'id' => '12',
          'question_id' => '7',
          'response' => 'Opção de resposta 7-3',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 3 for Question 7 criated');
    }

    public function createOptionsResponsesForQuestion8 (){
      //SCALE_SELECTION
      OptionsResponses::create([
          'id' => '13',
          'question_id' => '8',
          'response' => '1',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 1 for Question 8 criated');

      OptionsResponses::create([
          'id' => '14',
          'question_id' => '8',
          'response' => '10',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 2 for Question 8 criated');
    }

    public function createOptionsResponsesForQuestion10 (){
      //UNIQUE_SELECTION
      OptionsResponses::create([
          'id' => '15',
          'question_id' => '10',
          'response' => 'Opção de resposta 10-1',
          'truth' => '0'
      ]);
      $this->command->info('OptionsResponse 1 for Question 10 criated');

      OptionsResponses::create([
          'id' => '16',
          'question_id' => '10',
          'response' => 'Opção de resposta 10-2',
          'truth' => '0'
      ]);
      $this->command->info('OptionsResponse 2 for Question 10 criated');

      OptionsResponses::create([
          'id' => '17',
          'question_id' => '10',
          'response' => 'Opção de resposta 10-3',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 3 for Question 10 criated');
    }

    public function createOptionsResponsesForQuestion11 (){
      //MULTIPLE_SELECTION
      OptionsResponses::create([
          'id' => '18',
          'question_id' => '11',
          'response' => 'Opção de resposta 11-1',
          'truth' => '0'
      ]);
      $this->command->info('OptionsResponse 1 for Question 11 criated');

      OptionsResponses::create([
          'id' => '19',
          'question_id' => '11',
          'response' => 'Opção de resposta 11-2',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 2 for Question 11 criated');

      OptionsResponses::create([
          'id' => '20',
          'question_id' => '11',
          'response' => 'Opção de resposta 11-3',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 3 for Question 11 criated');
    }

    public function createOptionsResponsesForQuestion12 (){
      //SCALE_SELECTION
      OptionsResponses::create([
          'id' => '21',
          'question_id' => '12',
          'response' => '1',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 1 for Question 12 criated');

      OptionsResponses::create([
          'id' => '22',
          'question_id' => '12',
          'response' => '10',
          'truth' => '1'
      ]);
      $this->command->info('OptionsResponse 2 for Question 12 criated');
    }


}
