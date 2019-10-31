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

    public function addProperty(Request $request)
    {
        // dd($request->toArray());
        $property = Property::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
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
        $property = Property::where('id', $request->propertyId)->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'region' => $request->region,
            'zip_code' => $request->zip_code,
            'extra_field' => $request->extra_field
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
