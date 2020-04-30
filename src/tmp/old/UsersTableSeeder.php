<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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

        // $faker = new Faker();
        $this->createSuperAdmins();
        // $this->createAdmins();
        // $this->createTargets();
    }

    public function createSuperAdmins(){
      User::create([
          'id' => 1,
          'company_id' => 1,
          'cost_center_id' => 1,
          'address_id' => 1,
          'username' => 'Sinei',
          'email' => 'sidnei.bertozzi@gmail.com',
          'password' => bcrypt('sidnei.bertozzi123'),
          'role_id' => 1,
          'status_id' => 1,
      ]);
      $this->command->info('Admin created: [user: sidnei.bertozzi]');

      User::create([
          'id' => 2,
          'company_id' => 1,
          'cost_center_id' => 1,
          'address_id' => 1,
          'username' => 'Andrê',
          'email' => 'almmarques@gmail.com',
          'password' => bcrypt('almmarques123'),
          'role_id' => 1,
          'status_id' => 1,
      ]);
      $this->command->info('Admin created: [user: almmarques]');

      User::create([
          'id' => 3,
          'company_id' => 1,
          'cost_center_id' => 1,
          'address_id' => 1,
          'username' => 'Igor',
          'email' => 'ibuenaga@gmail.com',
          'password' => bcrypt('ibuenaga123'),
          'role_id' => 1,
          'status_id' => 1,
      ]);
      $this->command->info('Admin created: [user: ibuenaga]');

      User::create([
          'id' => 4,
          'company_id' => 1,
          'cost_center_id' => 1,
          'address_id' => 1,
          'username' => 'Jose R',
          'email' => 'josergm86@gmail.com',
          'password' => bcrypt('jr24666gm'),
          'role_id' => 1,
          'status_id' => 1,
      ]);
      $this->command->info('Admin created: [user: josergm86]');

      User::create([
          'id' => 5,
          'company_id' => 1,
          'cost_center_id' => 1,
          'address_id' => 1,
          'username' => 'Alberto',
          'email' => 'albertord84@gmail.com',
          'password' => bcrypt('albertord84123'),
          'role_id' => 1,
          'status_id' => 1,
      ]);
      $this->command->info('Admin created: [user: albertord84]');
    }
}
