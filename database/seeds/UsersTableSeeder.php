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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('Creating Users:');

        // $faker = new Faker();
        $this->createSuperAdmins();
        $this->createAdmins();
        $this->createTargets();
    }

    public function createSuperAdmins(){
      User::create([
          'id' => 1,
          'company_id' => 1,
          'cost_center_id' => 1,
          'address_id' => 1,
          'username' => 'Sidnei',
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
          'username' => 'josergm86',
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
          'username' => 'alberto',
          'email' => 'albertord84@gmail.com',
          'password' => bcrypt('12345678'),
          'role_id' => 1,
          'status_id' => 1,
      ]);
      $this->command->info('Admin created: [user: albertord84]');
    }

    public function createAdmins(){
      User::create([
          'id' => 6,
          'company_id' => 1,
          'cost_center_id' => 1,
          'address_id' => 1,
          'username' => 'Admin',
          'email' => 'admin@physiback.com',
          'password' => bcrypt('admin'),
          'role_id' => 2,
          'status_id' => 1,
      ]);
      $this->command->info('Admin created: [user: admin@physiback.com]');
    }

    public function createTargets(){
      User::create([
        'id' => 7,
        'company_id' => 1,
        'cost_center_id' => 1,
        'address_id' => 1,
        'username' => 'Target1',
        'email' => 'target1@physiback.com',
        'password' => bcrypt('target1'),
        'role_id' => 3,
        'status_id' => 1,
    ]);
    $this->command->info('Admin created: [user: target1@physiback.com]');

      User::create([
        'id' => 8,
        'company_id' => 1,
        'cost_center_id' => 1,
        'address_id' => 1,
        'username' => 'Target2',
        'email' => 'target2@physiback.com',
        'password' => bcrypt('target2'),
        'role_id' => 3,
        'status_id' => 1,
    ]);
    $this->command->info('Admin created: [user: target2@physiback.com]');
    }

}
