<?php

use App\Models\Invitations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvitationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Invitations Table...');

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('invitations')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Invitations:');

      $this->createInvitationsToTarget1company2();
      $this->createInvitationsToTarget1company3();
    }

    public function createInvitationsToTarget1company2(){
      Invitations::create([
          'id' => '1',
          'user_id' => '10',
          'campaign_id' => '1', // this campaing has a released questionnaire
          'accepted' => '1',
      ]);
      $this->command->info('Invitation 1 to target1company2 10 CREATED');

      Invitations::create([
          'id' => '2',
          'user_id' => '10',
          'campaign_id' => '2', // this campaing has a non-released questionnaire
          'accepted' => '1',
      ]);
      $this->command->info('Invitation 2 to target1company2 10 CREATED');

      Invitations::create([
          'id' => '3',
          'user_id' => '10',
          'campaign_id' => '3', // this campaing has a non-released questionnaire
          'accepted' => '0',
      ]);
      $this->command->info('Invitation 3 to target1company2 10 CREATED');
    }

    public function createInvitationsToTarget1company3(){
      Invitations::create([
          'id' => '4',
          'user_id' => '12',
          'campaign_id' => '2', // this campaing has a non-released questionnaire
          'accepted' => '1',
      ]);
      $this->command->info('Invitation 1 to target1company3 10 CREATED');

      Invitations::create([
          'id' => '5',
          'user_id' => '12',
          'campaign_id' => '3', // this campaing has a non-released questionnaire
          'accepted' => '1',
      ]);
      $this->command->info('Invitation 2 to target1company3 10 CREATED');
    }
}
