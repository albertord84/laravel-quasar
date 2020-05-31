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
          'address_id' => 1,
          'username' => 'Sidnei',
          'email' => 'sidnei.bertozzi@gmail.com',
          'password' => 'sidnei.bertozzi123',
          'role_id' => 1,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: sidnei.bertozzi]');

      User::create([
          'id' => 2,
          'company_id' => 1,
          'address_id' => 1,
          'username' => 'Andrê',
          'email' => 'almmarques@gmail.com',
          'password' => 'almmarques123',
          'role_id' => 1,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: almmarques]');

      User::create([
          'id' => 3,
          'company_id' => 1,
          'address_id' => 1,
          'username' => 'Igor',
          'email' => 'ibuenaga@gmail.com',
          'password' => 'ibuenaga123',
          'role_id' => 1,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: ibuenaga]');

      User::create([
          'id' => 4,
          'company_id' => 1,
          'address_id' => 1,
          'username' => 'josergm86',
          'email' => 'josergm86@gmail.com',
          'password' => 'jr24666gm',
          'role_id' => 1,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: josergm86]');

      User::create([
          'id' => 5,
          'company_id' => 1,
          'address_id' => 1,
          'username' => 'alberto',
          'email' => 'albertord84@gmail.com',
          'password' => '12345678',
          'role_id' => 1,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: albertord84]');
    }



    public function createAdmins(){
      User::create([
          'id' => 6,
          'company_id' => 2,
          'address_id' => 1,
          'username' => 'admin1company2',
          'email' => 'admin1@company2.com',
          'password' => 'admin',
          'role_id' => 2,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: admin1@company2.com]');

      User::create([
          'id' => 7,
          'company_id' => 2,
          'address_id' => 1,
          'username' => 'admin2company2',
          'email' => 'admin2@company2.com',
          'password' => 'admin',
          'role_id' => 2,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: admin2@company2.com]');

      User::create([
          'id' => 8,
          'company_id' => 3,
          'address_id' => 1,
          'username' => 'admin1company3',
          'email' => 'admin1@company3.com',
          'password' => 'admin',
          'role_id' => 2,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: admin1@company3.com]');

      User::create([
          'id' => 9,
          'company_id' => 3,
          'address_id' => 1,
          'username' => 'admin2company3',
          'email' => 'admin2@company3.com',
          'password' => 'admin',
          'role_id' => 2,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: admin2@company3.com]');
    }



    public function createTargets(){
      User::create([
        'id' => 10,
        'username' => 'target1company2',
        'email' => 'target1@company2.com',
        'password' => 'target',
        'role_id' => 3,
        'status_id' => 1,
      ]);
      $this->command->info('Admin created: [user: target1@company2.com]');

      User::create([
          'id' => 11,
          'username' => 'target2company2',
          'email' => 'target2@company2.com',
          'password' => 'target',
          'role_id' => 3,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: target2@company2.com]');

      User::create([
        'id' => 12,
        'username' => 'target1company3',
        'email' => 'target1@company3.com',
        'password' => 'target',
        'role_id' => 3,
        'status_id' => 1,
      ]);
      $this->command->info('Admin created: [user: target1@company3.com]');

      User::create([
          'id' => 13,
          'username' => 'target2company3',
          'email' => 'target2@company3.com',
          'password' => 'target',
          'role_id' => 3,
          'status_id' => 2,
      ]);
      $this->command->info('Admin created: [user: target2@company3.com]');
    }

}
