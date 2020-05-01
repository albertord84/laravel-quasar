<?php

use App\Models\QuestionsTypes;
use App\Models\QuestionsTypesTypes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
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
      DB::table('QuestionsTypes')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating QuestionsTypes:');

      $this->createQuestionsTypes();
    }

    public function createQuestionsTypes(){
      // QuestionsTypes::create([
      //     'id' => '1',
      //     'type_id' => '',
      //     'response_type_id' => '',
      //     'question' => '',
      //     'json_data' => '',    //json_data.type === 'image'  || json_data.type === 'video'  || json_data.type === 'url'
      // ]);
      // $this->command->info('Questionnary 1 criated');
    }
}
