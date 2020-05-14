<?php

use App\Models\CostsCenters;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CostsCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate CostsCenters Table...');

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('costs_centers')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating CostsCenters:');

      $this->createCostsCenters();
    }

    public function createCostsCenters(){
      CostsCenters::create([
          'id' => '1',
          'company_id' => '1',
          'admin_id' => '1',
          'name' => '',
      ]);
      $this->command->info('CostsCenter criated');
    }
}
