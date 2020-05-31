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

      Companies::create([
        'id' => '2',
        'responsible_id' => '6',
        'address_id' => '1',
        'social_reason' => 'Empresa 2',
        'fantasy_name' => 'Empresa 2',
        'cnpj' => '52.877.976/0001-40',
        'phone' => '5521965913089',
        'phone2' => '',
        'decription' => 'Drogarias São Paulo',
        'observation' => 'Drogarias São Paulo'
      ]);
      $this->command->info('Company Empresa 1 created');

      Companies::create([
        'id' => '3',
        'responsible_id' => '6',
        'address_id' => '1',
        'social_reason' => 'Empresa 3',
        'fantasy_name' => 'Empresa 3',
        'cnpj' => '96.748.178/0001-94',
        'phone' => '5521965913089',
        'phone2' => '',
        'decription' => 'Drogaria Pachecos',
        'observation' => 'Drogaria Pachecos'
      ]);
      $this->command->info('Company Empresa 1 created');
    }
}
