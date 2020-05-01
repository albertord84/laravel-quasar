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

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('companies')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Companies:');

      $this->createUserRoles();
    }

    public function createUserRoles(){
      Companies::create([
        'id' => '1',
        'responsible_id' => '1',
        'address_id' => 'Avenida Maracanã',
        'social_reason' => 'Physiback',
        'fantasy_name' => 'Physiback',
        'cnpj' => '88.495.263/0001-61',
        'phone' => '5521965913089',
        'phone2' => 'Gestão de enquetes online',
        'decription' => 'Gestão de enquetes online',
        'observation' => 'Gestão de enquetes online'
      ]);
      $this->command->info('SUPERADMIN Role created');
    }
}
