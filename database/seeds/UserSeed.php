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
        $role_franchise = Role::where('name', 'Franchise')->first();
        $role_client = Role::where('name', 'Client')->first();
        
        $super_admin = new User();
        $super_admin->name = "Super Admin User";
        $super_admin->phone_number = "03000000000";
        $super_admin->region = "Delaware";
        $super_admin->email = "superadmin@project.com";
        $super_admin->password = Hash::make('123456');
        $super_admin->save();
        $SA_U_D = new UserDetails();
        $SA_U_D->user_id = $super_admin->id;
        $SA_U_D->save();
        $super_admin->roles()->attach($role_super_admin);

        $admin = new User();
        $admin->name = "Admin User";
        $admin->phone_number = "03000000000";
        $admin->region = "Delaware";
        $admin->email = "admin@project.com";
        $admin->password = Hash::make('123456');
        $admin->save();
        $A_U_D = new UserDetails();
        $A_U_D->user_id = $admin->id;
        $A_U_D->save();
        $admin->roles()->attach($role_admin);

        $user_franchise = new User();
        $user_franchise->name = "Franchise User";
        $user_franchise->email = "franchise@project.com";
        $user_franchise->phone_number = "03000000000";
        $user_franchise->password = Hash::make('123456');
        $user_franchise->region = "Delaware";
        $user_franchise->save();
        $B_U_D = new UserDetails();
        $B_U_D->user_id = $user_franchise->id;
        $B_U_D->save();
        $user_franchise->roles()->attach($role_franchise);

        $user_franchise = new User();
        $user_franchise->name = "Franchise User";
        $user_franchise->email = "franchise1@project.com";
        $user_franchise->phone_number = "03000000000";
        $user_franchise->password = Hash::make('123456');
        $user_franchise->region = "Delaware";
        $user_franchise->save();
        $B_U_D = new UserDetails();
        $B_U_D->user_id = $user_franchise->id;
        $B_U_D->save();
        $user_franchise->roles()->attach($role_franchise);

        $user_franchise = new User();
        $user_franchise->name = "Franchise User";
        $user_franchise->email = "franchise2@project.com";
        $user_franchise->phone_number = "03000000000";
        $user_franchise->password = Hash::make('123456');
        $user_franchise->region = "Delaware";
        $user_franchise->save();
        $B_U_D = new UserDetails();
        $B_U_D->user_id = $user_franchise->id;
        $B_U_D->save();
        $user_franchise->roles()->attach($role_franchise);

        $user_franchise = new User();
        $user_franchise->name = "Franchise User";
        $user_franchise->email = "franchise3@project.com";
        $user_franchise->phone_number = "03000000000";
        $user_franchise->password = Hash::make('123456');
        $user_franchise->region = "Florida";
        $user_franchise->save();
        $B_U_D = new UserDetails();
        $B_U_D->user_id = $user_franchise->id;
        $B_U_D->save();
        $user_franchise->roles()->attach($role_franchise);

        $user_franchise = new User();
        $user_franchise->name = "Franchise User";
        $user_franchise->email = "franchise4@project.com";
        $user_franchise->phone_number = "03000000000";
        $user_franchise->password = Hash::make('123456');
        $user_franchise->region = "Georgia";
        $user_franchise->save();
        $B_U_D = new UserDetails();
        $B_U_D->user_id = $user_franchise->id;
        $B_U_D->save();
        $user_franchise->roles()->attach($role_franchise);

        $user_franchise = new User();
        $user_franchise->name = "Franchise User";
        $user_franchise->email = "franchise5@project.com";
        $user_franchise->phone_number = "03000000000";
        $user_franchise->password = Hash::make('123456');
        $user_franchise->region = "Maryland";
        $user_franchise->save();
        $B_U_D = new UserDetails();
        $B_U_D->user_id = $user_franchise->id;
        $B_U_D->save();
        $user_franchise->roles()->attach($role_franchise);

        $user_franchise = new User();
        $user_franchise->name = "Franchise User";
        $user_franchise->email = "franchise6@project.com";
        $user_franchise->phone_number = "03000000000";
        $user_franchise->password = Hash::make('123456');
        $user_franchise->region = "North Carolina";
        $user_franchise->save();
        $B_U_D = new UserDetails();
        $B_U_D->user_id = $user_franchise->id;
        $B_U_D->save();
        $user_franchise->roles()->attach($role_franchise);

        $user_seller = new User();
        $user_seller->name = "Client User";
        $user_seller->email = "client@project.com";
        $user_seller->phone_number = "03000000000";
        $user_seller->region = "Delaware";
        $user_seller->password = Hash::make('123456');
        $user_seller->save();
        $S_U_D = new UserDetails();
        $S_U_D->user_id = $user_seller->id;
        $S_U_D->save();
        $user_seller->roles()->attach($role_client);

    }
}
