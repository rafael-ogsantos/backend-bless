<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Http\Resources\AgentRecourse;

class ApiAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::join('user_role',"users.id","=","user_role.user_id")->join('roles',"user_role.role_id","=","roles.id")->select("users.*","roles.id as role_id")->where("roles.id",3)->get();
        // dd($users);
        return response()->json([
            'data' => AgentRecourse::collection($users)
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getOwnRegionAgents(Request $request)
    {
        // dd($request->toArray(), 'getOwnRegionAgents');
        $items = User::where('region', $request->region)->join('user_role',"users.id","=","user_role.user_id")
        ->join('roles',"user_role.role_id","=","roles.id")->select("users.*","roles.id as role_id")->where("roles.id",3)->get();
        return response()->json([
            'data' => AgentRecourse::collection($items)
        ]);
    }

    public function searchAgent(Request $request)
    {
        // dd($request->toArray(), 'searchAgent');
        $items = User::where('region', $request->region)->join('user_role',"users.id","=","user_role.user_id")
        ->join('roles',"user_role.role_id","=","roles.id")->select("users.*","roles.id as role_id")->where("roles.id",3)->get();
        return response()->json([
            'data' => AgentRecourse::collection($items)
        ]);
    }

    public function allAgent(Request $request)
    {
        // dd($request->toArray(), 'searchAgent');
        $items = User::join('user_role',"users.id","=","user_role.user_id")
        ->join('roles',"user_role.role_id","=","roles.id")->select("users.*","roles.id as role_id")->where("roles.id",3)->get();
        return response()->json([
            'data' => AgentRecourse::collection($items)
        ]);
    }
}
