<?php
namespace App\Http\Controllers;


// Just produce dummy sin wave for testing



use App\Models\WaterLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webpatser\Uuid\Uuid;

class WaterLevelSinTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $water_level = 0;

        for ($x = 0; $x <= 1000; $x++) {
            $water_level += 1;
            $water_level = sin($water_level);
            $input = [
                'uuid' => 'a6832652-e5e2-471a-bb13-11067bba3790',
                'water_level'=> $water_level,
            ];

             WaterLevel::create($input);
          }


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
