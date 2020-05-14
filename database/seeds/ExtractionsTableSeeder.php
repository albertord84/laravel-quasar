<?php

use App\Models\Extractions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtractionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Extractions Table...');

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('extractions')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Extractions:');

      $this->createExtractions();
    }

    public function createExtractions(){
      Extractions::create([
          'id' => '1',
          'status_id' => '1',
          'user_id' => '7',
          'requested_value' => '100.00',
          'payed_value' => '0.00'
      ]);
      $this->command->info('Extraction SOLICITED');

    }
}
