<?php

use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Address Table...');

      // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      // DB::table('users_managers')->truncate();
      // DB::table('users_attendants')->truncate();
      DB::table('address')->truncate();
      // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Address:');

      $this->createAddress();
    }

    public function createAddress(){
      Address::create([
          'id' => '1',
          'cep' => '24020206',
          'street' => 'Rua Visconde de Sepetiva',
          'number' => '223',
          'complement' => '302',
          'district' => 'Centro',
          'city' => 'Niterói',
          'uf' => 'RJ',
      ]);
      $this->command->info('Address');
    }
}
