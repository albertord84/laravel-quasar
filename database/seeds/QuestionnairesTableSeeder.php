<?php

use App\Models\Questionnaires;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Questionnaires Table...');

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('questionnaires')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Questionnaires:');

      $this->createQuestionnaires();
    }

    public function createQuestionnaires(){
      Questionnaires::create([
          'id' => '1',
          'plane_id' => '1',
          'criator_id' => '6',
          'updater_id' => '6',
          'name' => 'Avaliação da hidroxocloroquina no tratamento da COVID-19',
          'description' => 'Questionário para avaliar o uso da hidroxocloroquina no tratamento da COVID-19 e seus impatos nos pacientes',
          'observation' => 'Esse questionário deve ser aplicado apenas a médicos intensivistas de UPAs',
          'released' => '1',
      ]);
      $this->command->info('Questionnary 1 criated');

      Questionnaires::create([
          'id' => '2',
          'plane_id' => '2',
          'criator_id' => '6',
          'updater_id' => '6',
          'name' => 'Uso da Cannabis Sativa na restauração neurológica em paciente com ELA',
          'description' => 'Questionário para avaliar o uso da Cannabis Sativa na restauração neurológica em paciente com Esclerose Lateral Amiotrófica (ELA)',
          'observation' => 'Esse questionário deve ser aplicado apenas a médicos neurologistas',
          'released' => '0',
      ]);
      $this->command->info('Questionnary 2 criated');

      Questionnaires::create([
          'id' => '3',
          'plane_id' => '3',
          'criator_id' => '6',
          'updater_id' => '6',
          'name' => 'Uso do Captopril em pacientes com hiper-tensão arterial',
          'description' => 'Questionário para avaliar o uso do Captopril em pacientes com hiper-tensão arterial que apresentam doenças cardíacas congênitas',
          'observation' => 'Esse questionário deve ser aplicado apenas a médicos cardiologistas',
          'released' => '0',
      ]);
      $this->command->info('Questionnary 3 criated');
    }
}
