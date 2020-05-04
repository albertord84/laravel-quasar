<?php

use App\Models\QuestionsTypes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate QuestionsTypes Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('questions_types')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating QuestionsTypes:');

      $this->createQuestionsTypes();
    }

    public function createQuestionsTypes(){
      QuestionsTypes::create([
          'id' => '1',
          'name' => 'SINGLE',
          'decription' => 'QuestionsType SINGLE'
      ]);
      $this->command->info('QuestionsType SINGLE');

      QuestionsTypes::create([
          'id' => '2',
          'name' => 'IMAGE',
          'decription' => 'QuestionsType IMAGE'
      ]);
      $this->command->info('QuestionsType IMAGE');

      QuestionsTypes::create([
          'id' => '3',
          'name' => 'VIDEO',
          'decription' => 'QuestionsType VIDEO'
      ]);
      $this->command->info('QuestionsType VIDEO');

      QuestionsTypes::create([
          'id' => '4',
          'name' => 'URL',
          'decription' => 'QuestionsType URL'
      ]);
      $this->command->info('QuestionsType URL');
    }
}
