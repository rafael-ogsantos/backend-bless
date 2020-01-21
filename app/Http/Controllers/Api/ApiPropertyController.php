<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Property;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\PropertyMapResource;

class ApiPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Property::all();
        return response()->json([
            'data' => PropertyResource::collection($items)
        ]);
    }

    public function propertiesMapData()
    {
        $items = Property::all();
        return response()->json([
            'data' => PropertyMapResource::collection($items)
        ]);
    }


    public function propertiesAll()
    {
        $items = Property::all();
        return $items;
    }

    public function addProperty(Request $request)
    {
        // dd($request->toArray());
        $property = Property::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'negociacao' => $request->negociacao,
            'tipo' => $request->tipo,
            'areap' => $request->areap,
            'areat' => $request->areat,
            'numero_quartos' => $request->numero_quartos,
            'iptu' => $request->iptu,
            'garagem' => $request->garagem,
            'banheiros' => $request->banheiros,
            'situacao' =>$request->situacao,
            'valor_cond' => $request->valor_cond,
            'valor_tot' => $request->valor_tot,
            'comissao' =>$request->comissao,
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'bairro' => $request->bairro,
            'numero' =>$request->numero,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'description' => $request->description,
            'price' => $request->price,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'region' => $request->region,
            'zip_code' => $request->zip_code,
            'extra_field' => $request->extra_field
        ]);
        $property_id = $property->id;
        return response()->json([
            'data' => $property_id
        ]);
    }

    public function addPropertyImage(Request $request)
    {
        // dd($request->toArray());
        $property = Property::where('id', $request->propertyId)->first();
        
        $new_image = '';
        if($request->hasfile('image')){
            $image_array = $request->file('image');
            $image_ext = $image_array->getClientOriginalExtension();
            $new_image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path, $new_image);
            // if ($property->image != "default.png") {
            //     @unlink(public_path('project-assets\uploaded\images/') . $property->image);
            // }
        }

        Property::where('id', $request->propertyId)->update([
            'image' => $new_image != "" ? $new_image : $property->image,
        ]);
        return response()->json([
            'data' => "done"
        ]);
    }

    public function editProperty(Request $request)
    {
        // dd($request->toArray());
        $property = Property::where('id', $request->propertyId)->first();
        Property::where('id', $request->propertyId)->update([
            'title' => $request->title ? $request->title : $property->title,
            'negociacao' => $request->negociacao ? $request->negociacao : $property->negociacao,
            'tipo' => $request->tipo ? $request->tipo : $property->tipo,
            'areap' => $request->areap ? $request->areap : $property->areap,
            'areat' => $request->areat ? $request->areat : $property->areat,
            'numero_quartos' => $request->numero_quartos ? $request->numero_quartos : $property->numero_quartos,
            'iptu' => $request->iptu ? $request->iptu : $property->iptu,
            'garagem' => $request->garagem ? $request->garagem : $property->garagem,
            'banheiros' => $request->banheiros ? $request->banheiros : $property->banheiros,
            'situacao' =>$request->situacao ? $request->situacao : $property->situacao,
            'valor_cond' => $request->valor_cond ? $request->valor_cond : $property->valor_cond,
            'valor_tot' => $request->valor_tot ? $request->valor_tot : $property->valor_tot,
            'comissao' =>$request->comissao ? $request->comissao : $property->comissao,
            'cep' => $request->cep ? $request->cep : $property->cep,
            'endereco' => $request->endereco ? $request->endereco : $property->endereco,
            'bairro' => $request->bairro ? $request->bairro : $property->bairro,
            'numero' =>$request->numero ? $request->numero : $property->numero,
            'cidade' => $request->cidade ? $request->cidade : $property->cidade,
            'estado' => $request->estado ? $request->estado : $property->estado,
            'description' => $request->description ? $request->description : $property->description,
            'price' => $request->price ? $request->price : $property->price,
            'latitude' => $request->latitude ? $request->latitude : $property->latitude,
            'longitude' => $request->longitude ? $request->longitude : $property->longitude,
            'region' => $request->region ? $request->region : $property->region,
            'zip_code' => $request->zip_code ? $request->zip_code : $property->zip_code,
            'extra_field' => $request->extra_field ? $request->extra_field : $property->extra_field
        ]);
        return response()->json([
            'data' => "Edited"
        ]);
    }

    public function editPropertyImage(Request $request)
    {
        // dd($request->toArray());
        $property = Property::where('id', $request->propertyId)->first();        
        $new_image = '';
        if($request->hasfile('image')){
            $image_array = $request->file('image');
            $image_ext = $image_array->getClientOriginalExtension();
            $new_image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path, $new_image);
            if ($property->image != "default.png") {
                @unlink(public_path('project-assets\uploaded\images/') . $property->image);
            }
        };
        Property::where('id', $request->propertyId)->update([
            'image' => $new_image != "" ? $new_image : $property->image,
        ]);
        return response()->json([
            'data' => "done"
        ]);
    }

    public function deleteProperty(Request $request)
    {
        // dd($request->toArray());
        $data = $request->toArray();
        $propertyId = $data[0];
        $property = Property::where('id', $propertyId)->delete();
        return response()->json([
            'data' => "Deleted"
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
}
