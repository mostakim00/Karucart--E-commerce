<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Backend\Setting;
use App\Models\Role;
use App\Models\User;


class SetUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // USER SEEDER
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => 'password',
            'role_id' => 1,
            'phone' => '015984498',
            'nid' => '1961157458',
        ]);

        // ROLE SEEDER
        $roles = ['superadmin', 'admin', 'vendor', 'customer'];
        foreach ($roles as $role) {
            Role::create([
                'role_name' => $role,
                'role_comments' => "Comment Not Available",
                'role_status' => 1,
            ]);
        }

        Setting::create([
            'company_name' => 'Example Company',
        ]);
    }
}
