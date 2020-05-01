<?php

use App\Models\BasesOrigins;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasesOriginsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate BasesOrigins Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('bases_origins')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating BasesOrigins:');

      $this->createBasesOrigins();
    }

    public function createBasesOrigins(){
      BasesOrigins::create([
          'id' => '1',
          'name' => 'PUBLIC',
          'decription' => 'BasesOrigins PUBLIC'
      ]);
      $this->command->info('BasesOrigins PUBLIC');

      BasesOrigins::create([
          'id' => '2',
          'name' => 'PRIVATE',
          'decription' => 'BasesOrigins PRIVATE'
      ]);
      $this->command->info('BasesOrigins PRIVATE');

      BasesOrigins::create([
          'id' => '3',
          'name' => 'PROTECTED',
          'decription' => 'BasesOrigins PROTECTED'
      ]);
      $this->command->info('BasesOrigins PROTECTED');
    }
}
