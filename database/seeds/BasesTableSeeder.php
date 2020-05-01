<?php

use App\Models\Bases;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Bases Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('bases')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Bases:');

      $this->createBases();
    }

    public function createBases(){
      Bases::create([
          'id' => '1',
          'origin_id' => '1',
          'company_id' => '1',
          'criator_id' => '1',
          'name' => 'ORGANIC_TARGETS',
          'decription' => 'Base de targets que cadastram no sistema de forma orgânica',
          'json_data' => '',
      ]);
      $this->command->info('Base ORGANIC_TARGETS Base criated');
    }
}
