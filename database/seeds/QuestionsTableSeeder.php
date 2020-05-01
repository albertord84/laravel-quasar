<?php

use App\Models\Questions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Questions  Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('questions')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Questions :');

      $this->createQuestionsForQuestionnarie1();
      $this->createQuestionsForQuestionnarie2();
      $this->createQuestionsForQuestionnarie3();
    }

    public function createQuestionsForQuestionnarie1 (){
      Questions::create([
          'id' => '1',
          'questionnaire_id' => '1',
          'type_id' => '1', //SINGLE
          'response_type_id' => '1', //BOOLEAN
          'question' => 'A cloroquina cura o coronavírus?',
          'json_data' => '',
      ]);
      $this->command->info('Question 1 criated');

      Questions::create([
          'id' => '2',
          'questionnaire_id' => '1',
          'type_id' => '1', //SINGLE
          'response_type_id' => '1', //BOOLEAN
          'question' => 'A cloroquina surte efeito contra o coronavírus?',
          'json_data' => '',
      ]);
      $this->command->info('Question 2 criated');

      Questions::create([
          'id' => '3',
          'questionnaire_id' => '1',
          'type_id' => '1', //SINGLE
          'response_type_id' => '2', //UNIQUE_SELECTION
          'question' => 'Se tem efeito em laboratório, por que poderia não funcionar quando administrado em pessoas?',
          'json_data' => '',
      ]);
      $this->command->info('Question 3 criated');


      Questions::create([
          'id' => '4',
          'questionnaire_id' => '1',
          'type_id' => '1', //SINGLE
          'response_type_id' => '2', //UNIQUE_SELECTION
          'question' => 'A Covid-19 não tem cura e causa a morte de milhares de pessoas. Neste caso, um medicamento que mostra algum efeito não é melhor que nenhum?',
          'json_data' => '',
      ]);
      $this->command->info('Question 4 criated');
    }

    public function createQuestionsForQuestionnarie2 (){
      Questions::create([
          'id' => '5',
          'questionnaire_id' => '2',
          'type_id' => '1', //SINGLE
          'response_type_id' => '1', //BOOLEAN
          'question' => 'Os chamados tratamentos alternativos e/ou complementares para a ELA incluem o uso de Cannabis?',
          'json_data' => '',
      ]);
      $this->command->info('Question 5 criated');

      Questions::create([
          'id' => '6',
          'questionnaire_id' => '2',
          'type_id' => '1', //SINGLE
          'response_type_id' => '2', //UNIQUE_SELECTION
          'question' => 'A Cannabis é um antistamínico, estupefaciente, antibiótico, anticolinérgico? Selecione a resposta correta.',
          'json_data' => '',
      ]);
      $this->command->info('Question 6 criated');

      Questions::create([
          'id' => '7',
          'questionnaire_id' => '2',
          'type_id' => '1', //SINGLE
          'response_type_id' => '3', //MULTIPLE_SELECTION
          'question' => '',
          'json_data' => '',
      ]);
      $this->command->info('Question 7 criated');


      Questions::create([
          'id' => '8',
          'questionnaire_id' => '2',
          'type_id' => '1', //SINGLE
          'response_type_id' => '4', //SCALE_SELECTION
          'question' => 'Na escala de 1 até 10, como você avalia os efeitos do Cannabis na restauração neurológica dos paciente, onde 1 é Péssimo e 10 é Ótimo',
          'json_data' => '',
      ]);
      $this->command->info('Question 8 criated');
    }

    public function createQuestionsForQuestionnarie3 (){
      Questions::create([
          'id' => '9',
          'questionnaire_id' => '3',
          'type_id' => '1', //SINGLE
          'response_type_id' => '1', //BOOLEAN
          'question' => 'O uso do captopril pode preceder a elevação da pressão arterial?',
          'json_data' => '',
      ]);
      $this->command->info('Question 9 criated');

      Questions::create([
          'id' => '10',
          'questionnaire_id' => '3',
          'type_id' => '2', //IMAGE
          'response_type_id' => '2', //UNIQUE_SELECTION
          'question' => 'A seguinte imagem mostra um ECG que mostra uma arritmia cardiaca. Qual arritmia é? ',
          'json_data' => json_encode([
            'type'=> 'image',
            'ClientOriginalExtension'=> 'jpg',
            'src'=> 'http://1.bp.blogspot.com/-dD-KuqvYxXI/VZq5goNUKZI/AAAAAAAAAX4/DR9dq3VOhSw/s1600/ce_65.jpg'
          ])
      ]);
      $this->command->info('Question 10 criated');

      Questions::create([
          'id' => '11',
          'questionnaire_id' => '3',
          'type_id' => '3', //VIDEO
          'response_type_id' => '3', //MULTIPLE_SELECTION
          'question' => 'Assista o video e selecione quais das seguintes possibilidades são as corretas.',
          'json_data' => json_encode([
            'type'=> 'video',
            'ClientOriginalExtension'=> 'mp4',
            'src'=> 'https://www.youtube.com/watch?v=OF8Xe1O6n9k'
          ])
      ]);
      $this->command->info('Question 11 criated');


      Questions::create([
          'id' => '12',
          'questionnaire_id' => '3',
          'type_id' => '4', //URL
          'response_type_id' => '4', //SCALE_SELECTION
          'question' => 'Analise o artigo científico acessivel desde a URL anterior. Depois avalie a improtância do artigo na escala de 0 até 10, onde 0 é Ruim e 10 é Excelente.',
          'json_data' => json_encode([
            'type'=> 'url',
            'ClientOriginalExtension'=> 'pdf',
            'src'=> 'https://www.sciencedirect.com/science/article/pii/S014067367992186X'
          ])
      ]);
      $this->command->info('Question 12 criated');

      Questions::create([
          'id' => '13',
          'questionnaire_id' => '3',
          'type_id' => '1', //SINGLE
          'response_type_id' => '5', //DISCURSIVE
          'question' => 'Quais são as suas experiências na indicação do Captopril para o tratmento da hiper-tensão arterial?',
          'json_data' => '',
      ]);
      $this->command->info('Question 13 criated');
    }

}
