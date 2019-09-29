<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\UserDetails;

class ApiUserController extends Controller
{
    
    public function getUserData(Request $request)
    {
    	// dd($request->toArray());
    	$user = User::where('id', $request->id)->with('user_details')->first();
    	if ($user->api_token === $request->token) {
    		return response()->json([
    			'data' => $user->toArray()
    		]);
    	} else {
    		return response()->json([
    			'error' => "Session Out"
    		]);
    	}
    	
    }
}
