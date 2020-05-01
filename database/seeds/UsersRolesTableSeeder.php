<?php

use App\Models\UsersRoles;
use Illuminate\Database\Seeder;

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
      // UsersRoles::create([
      //   'id' => '1',
      //   'name' => 'ADMIN',
      //   'description' => 'Role Admin',
      // ]);
    }
}
