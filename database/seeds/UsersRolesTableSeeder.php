<?php

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
      $this->command->info('Truncate Users Table...');
      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('users')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Users:');

      $this->createUserRoles();
    }

    public function createUserRoles(){
      // User::create([
      //     'id' => 1,
      //     'company_id' => 1,
      //     'cost_center_id' => 1,
      //     'address_id' => 1,
      //     'username' => 'Sinei',
      //     'email' => 'sidnei.bertozzi@gmail.com',
      //     'password' => bcrypt('sidnei.bertozzi123'),
      //     'role_id' => 1,
      //     'status_id' => 1,
      // ]);
      // $this->command->info('Admin created: [user: sidnei.bertozzi]');
    }


}
