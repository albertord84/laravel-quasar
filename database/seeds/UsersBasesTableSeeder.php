<?php

use App\Models\UsersBases;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersBasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate UsersBases Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('costs_centers')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating UsersBases:');

      $this->createUsersBases();
    }

    public function createUsersBases(){
      UsersBases::create([
          'id' => '1',
          'base_id' => '1',
          'user_id' => '7',
      ]);
      $this->command->info('Relation between user Target1 and base ORGANIC_TARGETS criated');

      UsersBases::create([
          'id' => '2',
          'base_id' => '1',
          'user_id' => '8',
      ]);
      $this->command->info('Relation between user Target2 and base ORGANIC_TARGETS criated');
    }
}
