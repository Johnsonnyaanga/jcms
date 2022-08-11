<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Priority;
use App\Models\Queue;
use App\Models\Service;
use App\Models\SLA;
use App\Models\TicketStatus;
use App\Models\TicketType;
use Illuminate\Database\Seeder;

class TicketConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         $ticketType1 = TicketType::create([
            'name' => 'public',
            'valid_id' => 1
         ]);
         $ticketType2 = TicketType::create([
            'name' => 'private',
            'valid_id' => 1
         ]);




         //services
         $ticketService1 = Service::create([
            'name' => 'court-sevice',
            'comments' => 'okay',
            'valid_id' => 1,
            'type_id' => 1
         ]);

         $ticketService2 = Service::create([
            'name' => 'admin-sevice',
            'comments' => 'okay',
            'valid_id' => 1,
            'type_id' => 2
         ]);


         $ticketSla1 = SLA::create([
            'name' => 'sla1',
            'grace_period' => '6 Hours',
            'admin_note' => 'sla okay',
            'valid_id' => 1,
            'transient' => 1,
            'overdue' => 1
         ]);

         $ticketSla2 = SLA::create([
            'name' => 'sla2',
            'grace_period' => '12 Hours',
            'admin_note' => 'sla okay',
            'valid_id' => 1,
            'transient' => 1,
            'overdue' => 4
         ]);


         $ticketPriority1 = Priority::create([
            'name' => 'low',
            'valid_id' => 1
         ]);

         $ticketPriority2 = Priority::create([
            'name' => 'high',
            'valid_id' => 1
         ]);



         $Group1 = Group::create([
            'name' => 'Ombudsman',
            'comments' => 'group okay',
            'valid_id' => 1
         ]);

         $Group2 = Group::create([
            'name' => 'Magistrate Courts',
            'comments' => 'group okay',
            'valid_id' => 1
         ]);



         $queue1= Queue::create([
            'name' => 'Ombudsman',
            'groups_id'=>1,
            'unlock_time_out'=>2,
            'first_time_response'=>3,
            'first_time_response_notify'=>4,
            'update_time'=>2,
            'update_notify'=>2,
            'solution_time'=>2,
            'solution_notify'=>2,
            'system_adress_id'=>2,
            'default_sign_key'=>'hjhj',
            'follow_up_lock' =>1,
            'comments' => 'queue okay',
            'valid_id' => 1
         ]);


         $queue2= Queue::create([
            'name' => 'Milimani Criminal',
            'groups_id'=>2,
            'unlock_time_out'=>2,
            'first_time_response'=>3,
            'first_time_response_notify'=>4,
            'update_time'=>2,
            'update_notify'=>2,
            'solution_time'=>2,
            'solution_notify'=>2,
            'system_adress_id'=>2,
            'default_sign_key'=>'hjhj',
            'follow_up_lock' =>1,
            'comments' => 'queue okay',
            'valid_id' => 1
         ]);



         $TicketStatus1 = TicketStatus::create([
            'name' => 'New',
            'comments' => 'status okay',
            'valid_id' => 1
         ]);
         $TicketStatus2 = TicketStatus::create([
            'name' => 'Open',
            'comments' => 'status okay',
            'valid_id' => 1
         ]);
         $TicketStatus3 = TicketStatus::create([
            'name' => 'Close',
            'comments' => 'status okay',
            'valid_id' => 1
         ]);








    }
}
