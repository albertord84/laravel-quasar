<?php

use App\Models\UsersStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate UsersStatus Table...');

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('users_status')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating UsersStatus:');

      $this->createUserStatus();
    }

    public function createUserStatus(){
      UsersStatus::create([
          'id' => '1',
          'name' => 'BEGINNER',
          'decription' => 'UsersStatus BEGINNER',
      ]);
      $this->command->info('UsersStatus BEGINNER');

      UsersStatus::create([
          'id' => '2',
          'name' => 'ACTIVE',
          'decription' => 'UsersStatus ACTIVE',
      ]);
      $this->command->info('UsersStatus ACTIVE');

      UsersStatus::create([
          'id' => '3',
          'name' => 'DELETED',
          'decription' => 'UsersStatus DELETED',
      ]);
      $this->command->info('UsersStatus DELETED');

      UsersStatus::create([
          'id' => '4',
          'name' => 'INACTIVE',
          'decription' => 'UsersStatus INACTIVE',
      ]);
      $this->command->info('UsersStatus INACTIVE');

      UsersStatus::create([
          'id' => '5',
          'name' => 'PENDING',
          'decription' => 'UsersStatus PENDING',
      ]);
      $this->command->info('UsersStatus PENDING');

      UsersStatus::create([
          'id' => '6',
          'name' => 'PAUSED',
          'decription' => 'UsersStatus PAUSED',
      ]);
      $this->command->info('UsersStatus PAUSED');

    }
}
