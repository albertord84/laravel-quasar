<?php

use App\Models\ExtractionsStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtractionsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate ExtractionsStatus Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('extractions_status')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating ExtractionsStatus:');

      $this->createExtractionsStatus();
    }

    public function createExtractionsStatus(){
      ExtractionsStatus::create([
          'id' => '1',
          'name' => 'SOLICITED',
          'decription' => 'ExtractionsStatus SOLICITED'
      ]);
      $this->command->info('ExtractionsStatus SOLICITED');

      ExtractionsStatus::create([
          'id' => '2',
          'name' => 'APPROVED',
          'decription' => 'ExtractionsStatus APPROVED'
      ]);
      $this->command->info('ExtractionsStatus APPROVED');

      ExtractionsStatus::create([
          'id' => '3',
          'name' => 'TRANSFERRED',
          'decription' => 'ExtractionsStatus TRANSFERRED'
      ]);
      $this->command->info('ExtractionsStatus TRANSFERRED');

      ExtractionsStatus::create([
          'id' => '4',
          'name' => 'DENIED',
          'decription' => 'ExtractionsStatus DENIED'
      ]);
      $this->command->info('ExtractionsStatus DENIED');
    }
}
