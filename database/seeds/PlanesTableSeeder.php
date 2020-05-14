<?php

use App\Models\Planes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Truncate Planes Table...');

      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('planes')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $this->command->info('Creating Planes:');

      $this->createPlanes();
    }

    public function createPlanes(){
      Planes::create([
          'id' => '1',
          'name' => 'Starter',
          'price' => '100',
          'recompense' => '50',
          'description' => 'Plano mais baixo',
          'has_boolean_selection' => '1',
          'has_unique_selection' => '1',
          'has_multiple_selection' => '0',
          'has_scale_response' => '0',
          'has_discursive_response' => '0',
          'has_image_content' => '0',
          'has_video_content' => '0',
          'has_link_content' => '0',
      ]);
      $this->command->info('Plane Starter criated');

      Planes::create([
          'id' => '2',
          'name' => 'Ideal',
          'price' => '150',
          'recompense' => '75',
          'description' => 'Plano médio',
          'has_boolean_selection' => '1',
          'has_unique_selection' => '1',
          'has_multiple_selection' => '1',
          'has_scale_response' => '1',
          'has_discursive_response' => '1',
          'has_image_content' => '0',
          'has_video_content' => '0',
          'has_link_content' => '0',
      ]);
      $this->command->info('Plane Ideal criated');

      Planes::create([
          'id' => '3',
          'name' => 'Premium',
          'price' => '200',
          'recompense' => '100',
          'description' => 'Plano melhor',
          'has_boolean_selection' => '1',
          'has_unique_selection' => '1',
          'has_multiple_selection' => '1',
          'has_scale_response' => '1',
          'has_discursive_response' => '1',
          'has_image_content' => '1',
          'has_video_content' => '1',
          'has_link_content' => '1',
      ]);
      $this->command->info('Plane Premium criated');
    }
}
