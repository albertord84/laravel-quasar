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
        //athomics
        $this->call(UsersRolesTableSeeder::class);
        $this->call(UsersStatusesTableSeeder::class);
        $this->call(CampaignsStatusesTableSeeder::class);
        $this->call(ExtractionsStatusesTableSeeder::class);
        $this->call(QuestionsTypesTableSeeder::class);
        $this->call(ResponsesTypesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(PlanesTableSeeder::class);
        $this->call(BasesOriginsTableSeeder::class);

        // dependents
        $this->call(CompaniesTableSeeder::class);

        $this->call(BasesTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(UsersBasesTableSeeder::class);

        $this->call(CostsCentersTableSeeder::class);

        $this->call(QuestionnairesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(OptionsResponsesTableSeeder::class);

        $this->call(CampaignsTableSeeder::class);

        $this->call(ResponsesTableSeeder::class);

        $this->call(RecompensesTableSeeder::class);
        $this->call(ExtractionsTableSeeder::class);
        $this->call(AccountsBanksTableSeeder::class);
      }
}
