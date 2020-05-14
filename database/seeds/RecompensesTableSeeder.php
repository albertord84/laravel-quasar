<?php

use App\Models\Recompenses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecompensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Recompenses Table...');

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('recompenses')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Recompenses:');

      $this->createRecompenses();
    }

    public function createRecompenses(){
      Recompenses::create([
          'id' => '1',
          'user_id' => '8',
          'questionnaire_id' => '3',
          'campaign_id' => '3',
          'value' => '100.00',
      ]);
      $this->command->info('Recompenses 1');
    }
}
