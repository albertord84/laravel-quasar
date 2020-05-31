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
          'company_id' => '2',
          'admin_id' => '6',
          'name' => 'CentroCusto1 da Empresa2',
      ]);
      $this->command->info('CostsCenter criated');

      CostsCenters::create([
          'id' => '2',
          'company_id' => '2',
          'admin_id' => '7',
          'name' => 'CentroCusto2 da Empresa2',
      ]);
      $this->command->info('CostsCenter criated');

      CostsCenters::create([
          'id' => '3',
          'company_id' => '3',
          'admin_id' => '8',
          'name' => 'CentroCusto1 da Empresa3',
      ]);
      $this->command->info('CostsCenter criated');

      CostsCenters::create([
          'id' => '4',
          'company_id' => '3',
          'admin_id' => '9',
          'name' => 'CentroCusto2 da Empresa3',
      ]);
      $this->command->info('CostsCenter criated');
    }
}
