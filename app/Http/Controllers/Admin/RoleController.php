<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use App\Models\Role;

class RoleController extends Controller
{
    
    public function CheckRole()
    {
    	$users = User::where('id', '>', 1)->get();
    	return view('project.user-role.index',[
    		'users' => $users,
    	]);
    }

    public function assignRole(Request $request)
    {
    	$user = User::where('email', $request['email'])->first();
    	// dd($user->toArray());
    	$user->roles()->detach();
    	if ($request['admin']) {
    		$user->roles()->attach(Role::where('name', 'Admin')->first());
    	}
    	if ($request['franchise']) {
    		$user->roles()->attach(Role::where('name', 'Franchise')->first());
    	}
    	if ($request['seller']) {
    		$user->roles()->attach(Role::where('name', 'Client')->first());
    	}
    	return redirect()->back()->with('roleassigned','Role Assigned Successfully to user!');
    }

}
