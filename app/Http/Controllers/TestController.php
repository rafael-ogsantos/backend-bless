<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Contact;
use App\Models\Property;

use Carbon\Carbon;

class TestController extends Controller{
    protected $property;
    protected $contact;

	function __construct (Contact $contact,Property $property){
        $this->contact = $contact; 
        $this->property = $property; 
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function TestRoutes()
    {
        $users = User::all();
        return view('project.test-routes.index', compact('users'));
    }

    public function TokenExpireIn()
    {
        $date = Carbon::now()->addHour(2)->toDateTimeString();
        dd($date);
    }

    public function addMessage(Request $request)
    {
        try{
            //add ticket
            $mail = new Contact();
            $mail->sector = $request->setor;
            $mail->subject = $request->assunto;
            $mail->message = $request->mensagem;
            $mail->email_dn = $request->email;
            $mail->save();

            return array('sucess' => true);
        }catch(Exception $e){
            return array('error' => $e);
        }

    }

    public function getMessageSector(Request $request)
    {
        try{
            //pegar todos os ticket pelo tipo de setor
            $result = $this->contact
            ->where('contacts.sector','=', $request->sector)
            ->get();

            return array('sucess' => true, 'contact' => $result) ;
        }catch(Exception $e){
            return array('error' => $e);
        }

    }

    public function getMessageSectorPending(Request $request)
    {
        try{
            //pegar ticket pendente pelo tipo de setor
            $result = $this->contact
            ->where('contacts.sector','=', $request->sector)
            ->where('contacts.status','=', 'PENDING')
            ->get();

            return array('sucess' => true, 'contact' => $result) ;
        }catch(Exception $e){
            return array('error' => $e);
        }

    }

    public function getPropertyType(Request $request)
    {
        try{

            //filtro tipo compra/venda
            $result = $this->property
            ->where('properties.business_type','=', $request->type)
            ->get();

            return array('sucess' => true, 'propertys' => $result) ;
        }catch(Exception $e){
            return array('error' => $e);
        }

    }
}
