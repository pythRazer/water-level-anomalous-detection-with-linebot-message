<?php
namespace App\Http\Controllers\Api;

// The api controller about store new record, updating, deleteing for water level

use App\Models\WaterLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webpatser\Uuid\Uuid;

class WaterLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WaterLevel::all();
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

        return WaterLevel::create($request->only(['uuid', 'water_level']));
        // return($request->all());
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
        return WaterLevel::findOrFail($id);
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
        $waterLevel = WaterLevel::findOrFail($id);
        $waterLevel->update($request->only(['uuid', 'water_level', 'tags']));
        return $waterLevel;
        //
    }


    public function storeTags(Request $request)
    {

        return Tags::create($request->only(['start_time', 'end_time', 'tags']));
        // return($request->all());
        //
    }


    public function updateTags(Request $request, $id)
    {
        $tags = Tags::findOrFail($id);
        $tags->update($request->only(['start_time', 'end_time', 'tags']));
        return $tags;
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
        WaterLevel::findOrFail($id)->delete();
        //
    }
}
