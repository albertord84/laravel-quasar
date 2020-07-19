<?php

use Illuminate\Database\Seeder;
use App\Models\InvitationsStatus;

class InvitationsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Truncate InvitationsStatus Table...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('invitations_status')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('Creating InvitationsStatus:');
        $this->createExtractionsStatus();
    }

    public function createExtractionsStatus(){
        InvitationsStatus::create([
            'id' => '1',
            'name' => 'SENDED',
            'decription' => 'Sended from system to the Target'
        ]);
        $this->command->info('InvitationsStatus SENDED');

        InvitationsStatus::create([
            'id' => '2',
            'name' => 'ACCEPTED',
            'decription' => 'Invitation ACCEPTED by the Target'
        ]);
        $this->command->info('InvitationsStatus ACCEPTED');

        InvitationsStatus::create([
            'id' => '3',
            'name' => 'REJECTED',
            'decription' => 'Invitation REJECTED by the Target'
        ]);
        $this->command->info('InvitationsStatus REJECTED');

        InvitationsStatus::create([
            'id' => '4',
            'name' => 'ANSWERED',
            'decription' => 'Invitation ANSWERED by the Target'
        ]);
        $this->command->info('InvitationsStatus ANSWERED');

        InvitationsStatus::create([
            'id' => '5',
            'name' => 'CANCELLED',
            'decription' => 'Invitation CANCELLED by a Company Admin'
        ]);
        $this->command->info('InvitationsStatus CANCELLED');

        InvitationsStatus::create([
            'id' => '6',
            'name' => 'EXPIRED',
            'decription' => 'Invitation EXPIRED by time'
        ]);
        $this->command->info('InvitationsStatus EXPIRED');
    }
}
