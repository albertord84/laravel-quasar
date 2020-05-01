<?php

use App\Models\Campaigns;
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
        'response_amount' => '0',
        'invitations_sent' => '0',
        'invitations_accepted' => '0',
        'invitations_declined' => '0',

        // 'requested_date' => '2020-05-01 10:00:00',
        // 'analyzed_date' => '0000-00-00 00:00:00',
        // 'start_date' => '2020-05-10 10:00:00',
        // 'end_date' => '2020-05-20 10:00:00',
      ]);
      $this->command->info('Campaigns 1 created');
    }
}
