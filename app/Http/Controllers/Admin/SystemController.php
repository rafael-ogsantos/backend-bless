<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{
	public function showDashborad()
    {
        if (Auth::user()->roles[0]->id == 1) {
	        // Users Data
	        $total_users_all = User::count();
	        $total_users = $total_users_all - 1;
	        $admins = 0;
	        $franchice_users = 0;
	        $clients = 0;
	        $users_c = User::with('roles')->get();
	        foreach ($users_c as $user) {
	            if ($user->roles[0]->id === 2) {
	                $admins++;
	            }
	            if ($user->roles[0]->id === 3) {
	                $franchice_users++;
	            }
	            if ($user->roles[0]->id === 4) {
	                $clients++;
	            }
	        }
	        
	        return view('project.dashborad.index', compact(
	            'total_users',
	            'admins',
	            'franchice_users',
	            'clients',
	        ));
	    }
	}

}
