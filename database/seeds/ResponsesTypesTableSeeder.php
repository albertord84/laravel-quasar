<?php

use App\Models\ResponsesTypes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResponsesTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate ResponsesTypes Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('responses_types')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating ResponsesTypes:');

      $this->createResponsesTypes();
    }

    public function createResponsesTypes(){
      ResponsesTypes::create([
          'id' => '1',
          'name' => 'BOOLEAN',
          'decription' => 'ResponsesTypes BOOLEAN'
      ]);
      $this->command->info('ResponsesTypes BOOLEAN');

      ResponsesTypes::create([
          'id' => '2',
          'name' => 'UNIQUE_SELECTION',
          'decription' => 'ResponsesTypes UNIQUE_SELECTION'
      ]);
      $this->command->info('ResponsesTypes UNIQUE_SELECTION');

      ResponsesTypes::create([
          'id' => '3',
          'name' => 'MULTIPLE_SELECTION',
          'decription' => 'ResponsesTypes MULTIPLE_SELECTION'
      ]);
      $this->command->info('ResponsesTypes MULTIPLE_SELECTION');

      ResponsesTypes::create([
          'id' => '4',
          'name' => 'SCALE_SELECTION',
          'decription' => 'ResponsesTypes SCALE_SELECTION'
      ]);
      $this->command->info('ResponsesTypes SCALE_SELECTION');

      ResponsesTypes::create([
          'id' => '5',
          'name' => 'DISCURSIVE',
          'decription' => 'ResponsesTypes DISCURSIVE'
      ]);
      $this->command->info('ResponsesTypes DISCURSIVE');
    }
}
