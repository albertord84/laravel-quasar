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

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('responses')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
          'response_option_id' => '2',
          'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 1');

      Responses::create([
          'id' => '2',
          'user_id' => '7',
          'question_id' => '2',
          'campaign_id' => '1',
          'response_option_id' => '3',
          'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 2');

      Responses::create([
          'id' => '3',
          'user_id' => '7',
          'question_id' => '3',
          'campaign_id' => '1',
          'response_option_id' => '6',
          'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 3');

      Responses::create([
          'id' => '4',
          'user_id' => '7',
          'question_id' => '4',
          'campaign_id' => '1',
          'response_option_id' => '9',
          'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 4');
    }




    public function createResponsesOfQuestionnnaire2_ByTarget1(){
      Responses::create([
        'id' => '5',
        'user_id' => '7',
        'question_id' => '5',
        'campaign_id' => '2',
        'response_option_id' => '12',
        'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 5');

      Responses::create([
          'id' => '6',
          'user_id' => '7',
          'question_id' => '6',
          'campaign_id' => '2',
          'response_option_id' => '13',
          'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 6');

      Responses::create([
          'id' => '7',
          'user_id' => '7',
          'question_id' => '7',
          'campaign_id' => '2',
          'response_option_id' => '16',
          'discursive_text' => '',
      ]);
      $this->command->info('Response of Question 7-1');
      Responses::create([
        'id' => '8',
        'user_id' => '7',
        'question_id' => '7',
        'campaign_id' => '2',
        'response_option_id' => '18',
        'discursive_text' => '',
        ]);
      $this->command->info('Response of Question 7-2');


      Responses::create([
          'id' => '9',
          'user_id' => '7',
          'question_id' => '8',
          'campaign_id' => '2',
          // 'response_option_id' => '',
          'discursive_text' => '7',
      ]);
      $this->command->info('Response of Question 8');
    }





    public function createResponsesOfQuestionnnaire3_ByTarget2(){
        Responses::create([
          'id' => '10',
          'user_id' => '8',
          'question_id' => '9',
          'campaign_id' => '3',
          'response_option_id' => '22',
          'discursive_text' => '',
        ]);
        $this->command->info('Response of Question 9');

        Responses::create([
            'id' => '11',
            'user_id' => '8',
            'question_id' => '10',
            'campaign_id' => '3',
            'response_option_id' => '23',
            'discursive_text' => '',
        ]);
        $this->command->info('Response of Question 10');

        Responses::create([
            'id' => '12',
            'user_id' => '8',
            'question_id' => '11',
            'campaign_id' => '3',
            'response_option_id' => '26',
            'discursive_text' => '',
        ]);
        $this->command->info('Response of Question 11-1');
        Responses::create([
            'id' => '13',
            'user_id' => '8',
            'question_id' => '11',
            'campaign_id' => '3',
            'response_option_id' => '27',
            'discursive_text' => '',
        ]);
        $this->command->info('Response of Question 11-2');

        Responses::create([
            'id' => '14',
            'user_id' => '8',
            'question_id' => '12',
            'campaign_id' => '3',
            // 'response_option_id' => '',
            'discursive_text' => '8',
        ]);
        $this->command->info('Response of Question 12');

        Responses::create([
            'id' => '15',
            'user_id' => '8',
            'question_id' => '13',
            'campaign_id' => '3',
            // 'response_option_id' => '',
            'discursive_text' => 'O captopril é um inibidor da ECA - enzima conversora da angiotensina, que impede a angiotensina I de ser convertida em angiotensina II. Com a ausência da angiotensina II não há vasoconstricção periférica, diminuindo a resistência vascular periférica e promovendo uma diminuição da pressão arterial. Os efeitos benéficos do captopril na hipertensão e na insuficiência cardíaca parecem resultar principalmente da supressão do sistema renina-angiotensina-aldosterona, resultando em concentrações séricas diminuídas de angiotensina II e aldosterona.',
        ]);
        $this->command->info('Response of Question 13');
    }
}
