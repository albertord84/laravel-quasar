<?php

use App\Models\Companies;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Companies Table...');

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('companies')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Companies:');

      $this->createCompanies();
    }

    public function createCompanies(){
      Companies::create([
        'id' => '1',
        'responsible_id' => '1',
        'address_id' => '1',
        'social_reason' => 'Physiback',
        'fantasy_name' => 'Physiback',
        'cnpj' => '88495263000161',
        'phone' => '5521965913089',
        'phone2' => '',
        'decription' => 'Gestão de enquetes online',
        'observation' => 'Gestão de enquetes online'
      ]);
      $this->command->info('Company Physiback created');

      for($i=2; $i<120; $i++){
        Companies::create([
          'id' => "$i",
          'responsible_id' => '1',
          'address_id' => '1',
          'social_reason' => "Company $i",
          'fantasy_name' => "Company $i Fantasy name",
          'cnpj' => '88495263000161',
          'phone' => '5521965913089',
          'phone2' => '',
          'decription' => 'Gestão de enquetes online',
          'observation' => 'Gestão de enquetes online'
        ]);
        $this->command->info("Company $i created");
      }
    }
}
