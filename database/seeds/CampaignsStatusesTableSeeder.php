<?php

use App\Models\CampaignsStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate CampaignsStatus Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('campaigns_status')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating CampaignsStatus:');

      $this->createCampaignsStatus();
    }

    public function createCampaignsStatus(){
      CampaignsStatus::create([
          'id' => '1',
          'name' => 'CREATED',
          'decription' => 'CampaignsStatus CREATED',
      ]);
      $this->command->info('CampaignsStatus CREATED');

      CampaignsStatus::create([
          'id' => '2',
          'name' => 'ACTIVED',
          'decription' => 'CampaignsStatus ACTIVED',
      ]);
      $this->command->info('CampaignsStatus ACTIVED');

      CampaignsStatus::create([
          'id' => '3',
          'name' => 'PAUSED',
          'decription' => 'CampaignsStatus PAUSED',
      ]);
      $this->command->info('CampaignsStatus PAUSED');

      CampaignsStatus::create([
          'id' => '4',
          'name' => 'DELETED',
          'decription' => 'CampaignsStatus DELETED',
      ]);
      $this->command->info('CampaignsStatus DELETED');
    }
}
