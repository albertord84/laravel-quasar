<?php

use App\Models\UsersRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate UsersRoles Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('users_roles')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating UsersRoles:');

      $this->createUserRoles();
    }

    public function createUserRoles(){
      UsersRoles::create([
        'id' => '1',
        'name' => 'SUPERADMIN',
        'decription' => 'Role SUPERADMIN',
      ]);
      $this->command->info('SUPERADMIN Role created');

      UsersRoles::create([
        'id' => '2',
        'name' => 'ADMIN',
        'decription' => 'Role ADMIN',
      ]);
      $this->command->info('ADMIN Role created');

      UsersRoles::create([
        'id' => '3',
        'name' => 'TARGET',
        'decription' => 'Role TARGET',
      ]);
      $this->command->info('TARGET Role created');
    }
}
