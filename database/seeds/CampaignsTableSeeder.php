<?php

use App\Models\Campaigns;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Campaigns Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('campaigns')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Campaigns:');

      $this->createCampaigns();
    }

    public function createCampaigns(){
      Campaigns::create([
        'id' => '1',
        'status_id' => '1',
        'criator_id' => '6',
        'updater_id' => '6',
        'questionary_id' => '1',
        'base_id' => '1',
        'name' => 'Hidroxocloroquina e COVID-19',
        'objetive' => 'Combate ao coronavirus com Hidroxocloroquina',
        'description' => 'Essa campanha tem como objetivo avaliar a opinião dos médicos intensivistas sobre o combate ao coronavirus com Hidroxocloroquina',
        'observation' => 'Essa campanha deve ser liberada em Maio de 2020',
        'response_limit' => '1000',
        'response_amount' => '1',
        'invitations_sent' => '1000',
        'invitations_accepted' => '385',
        'invitations_declined' => '2',

        'invitations_send_date' => new Carbon('2020-05-01 10:00:00'),
        'requested_date' => new Carbon('2020-04-28 10:00:00'),
        'analyzed_date' => new Carbon('2000-04-29 00:00:00'),
        'start_date' => new Carbon('2020-05-01 10:00:00'),
        'end_date' => new Carbon('2020-05-20 10:00:00'),
      ]);
      $this->command->info('Campaign 1 created');

      Campaigns::create([
        'id' => '2',
        'status_id' => '1',
        'criator_id' => '6',
        'updater_id' => '6',
        'questionary_id' => '2',
        'base_id' => '1',
        'name' => 'Cannabis Sativa e ELA',
        'objetive' => 'Tratamento da ELA com Cannabis Sativa',
        'description' => 'Essa campanha tem como objetivo avaliar Tratamento da ELA com Cannabis Sativa',
        'observation' => 'Essa campanha deve ser liberada em Junho de 2020',
        'response_limit' => '500',
        'response_amount' => '1',
        'invitations_sent' => '500',
        'invitations_accepted' => '100',
        'invitations_declined' => '8',

        'invitations_send_date' => new Carbon('2020-05-01 10:00:00'),
        'requested_date' => new Carbon('2020-04-28 10:00:00'),
        'analyzed_date' => new Carbon('2000-04-29 00:00:00'),
        'start_date' => new Carbon('2020-05-01 10:00:00'),
        'end_date' => new Carbon('2020-05-20 10:00:00'),
      ]);
      $this->command->info('Campaign 2 created');

      Campaigns::create([
        'id' => '3',
        'status_id' => '1',
        'criator_id' => '6',
        'updater_id' => '6',
        'questionary_id' => '3',
        'base_id' => '1',
        'name' => 'Captopril e hiper-tensão arterial',
        'objetive' => 'Captopril e hiper-tensão arterial',
        'description' => 'Essa campanha tem como objetivo avaliar Captopril e hiper-tensão arterial',
        'observation' => 'Essa campanha deve ser liberada em Junho de 2020',
        'response_limit' => '200',
        'response_amount' => '1',
        'invitations_sent' => '200',
        'invitations_accepted' => '150',
        'invitations_declined' => '20',

        'invitations_send_date' => new Carbon('2020-05-01 10:00:00'),
        'requested_date' => new Carbon('2020-04-28 10:00:00'),
        'analyzed_date' => new Carbon('2000-04-29 00:00:00'),
        'start_date' => new Carbon('2020-05-01 10:00:00'),
        'end_date' => new Carbon('2020-05-20 10:00:00'),
      ]);
      $this->command->info('Campaign 3 created');
    }
}
