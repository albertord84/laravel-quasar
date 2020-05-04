<?php

use App\Models\AccountsBanks;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsBanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate AccountsBanks Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('accounts_banks')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating AccountsBanks:');

      $this->createAccountsBanks();
    }

    public function createAccountsBanks(){
      AccountsBanks::create([
          'id' => '1',
          'user_id' => '7', //id do target
          'bank' => 'BB',
          'agency' => '44598',
          'account' => '12521',
          'account_type' => '003', //corrente
          'dig' => '0',
          'titular_name' => 'Target1 da Silva Nunes',
          'titular_cpf' => '07367014198',
      ]);
      $this->command->info('AccountsBanks');

      AccountsBanks::create([
          'id' => '2',
          'user_id' => '8', //id do target
          'bank' => 'BB',
          'agency' => '44598',
          'account' => '12532',
          'account_type' => '003', //corrente
          'dig' => '0',
          'titular_name' => 'Target2 Pereira Saenz',
          'titular_cpf' => '07367014191',
      ]);
      $this->command->info('AccountsBanks');
    }
}
