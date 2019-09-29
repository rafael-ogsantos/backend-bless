<?php

use Illuminate\Database\Seeder;

use App\User;

use App\Models\Role;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super_admin = Role::where('name', 'Super Admin')->first();
        $role_admin = Role::where('name', 'Admin')->first();
        $role_rider = Role::where('name', 'Franchise')->first();
        $role_customer = Role::where('name', 'Client')->first();
        
        $super_admin = new User();
        $super_admin->name = "Super Admin User";
        $super_admin->email = "superadmin@project.com";
        $super_admin->password = Hash::make('123456');
        $super_admin->save();
        $SA_U_D = new UserDetails();
        $SA_U_D->user_id = $super_admin->id;
        $SA_U_D->save();
        $super_admin->roles()->attach($role_super_admin);

        $admin = new User();
        $admin->name = "Admin User";
        $admin->email = "admin@project.com";
        $admin->password = Hash::make('123456');
        $admin->save();
        $A_U_D = new UserDetails();
        $A_U_D->user_id = $admin->id;
        $A_U_D->save();
        $admin->roles()->attach($role_admin);

        $user_buyer = new User();
        $user_buyer->name = "Franchise User";
        $user_buyer->email = "franchise@project.com";
        $user_buyer->password = Hash::make('123456');
        $user_buyer->save();        
        $B_U_D = new UserDetails();
        $B_U_D->user_id = $user_buyer->id;
        $B_U_D->save();
        $user_buyer->roles()->attach($role_rider);

        $user_seller = new User();
        $user_seller->name = "Client User";
        $user_seller->email = "client@project.com";
        $user_seller->password = Hash::make('123456');
        $user_seller->save();
        $S_U_D = new UserDetails();
        $S_U_D->user_id = $user_seller->id;
        $S_U_D->save();
        $user_seller->roles()->attach($role_customer);

    }
}
