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

      $this->createUserRoles();
    }

    public function createUserRoles(){
      Campaigns::create([
        'id' => '1',
        'status_id' => '1',
        'criator_id' => '6',
        'updater_id' => '6',
        'questionary_id' => '1',
        'base_id' => '',
        'name' => '',
        'objetive' => '',
        'description' => '',
        'observation' => '',
        'response_limit' => '',
        'response_amount' => '',
        'invitations_sent' => '',
        'invitations_accepted' => '',
        'invitations_declined' => '',
        'requested_date' => '',
        'analyzed_date' => '',
        'start_date' => '',
        'end_date' => '',
      ]);
      $this->command->info('SUPERADMIN Role created');
    }
}
