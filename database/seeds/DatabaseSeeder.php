<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersRolesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);

        // $this->call(UsersStatusTableSeeder::class);
        // $this->call(CampaignsStatusTableSeeder::class);
        // $this->call(ExtractionsStatusTableSeeder::class);
        // $this->call(QuestionsTypesTableSeeder::class);
        // $this->call(ResponsesTypesTableSeeder::class);
        // $this->call(BasesOriginsTableSeeder::class);

        // $this->call(AddressTableSeeder::class);
        // $this->call(PlanesTableSeeder::class);
        // $this->call(BasesTableSeeder::class);

        // $this->call(CompaniesTableSeeder::class);
        // $this->call(CostsCentersTableSeeder::class);

        // $this->call(UsersTableSeeder::class);
        // $this->call(UsersBasesTableSeeder::class);

        // $this->call(QuestionnairesTableSeeder::class);
        // $this->call(CampaignsTableSeeder::class);
        // $this->call(QuestionsTableSeeder::class);
        // $this->call(ResponsesOptionsTableSeeder::class);
        // $this->call(ResponsesTableSeeder::class);
        // $this->call(ExtractionsTableSeeder::class);
        // $this->call(RecompensesTableSeeder::class);
        // $this->call(AccountsBanksTableSeeder::class);
    }
}
