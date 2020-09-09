<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use LINE\LINEBot;

use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;


class ReceiveAnomolousImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    function __construct()
    {
        $this->httpClient = new CurlHTTPClient(env("CHANNEL_TOKEN"));;
        $this->bot = new LINEBot($this->httpClient, ['channelSecret' => env("CHANNEL_SECRET")]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // Storing the message and user id
    public function store(Request $request)
    {

        $file = $request->file('image');

        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }


        $path = public_path() . '/abnormal_water_level_image';
        $file->move($path, $file->getClientOriginalName());


        $imageUrl = secure_asset('abnormal_water_level_image/'. $file->getClientOriginalName());
        // Example from line official documentation site: https://developers.line.biz/en/reference/messaging-api/#send-push-message
        $imageMessageBuilder = new ImageMessageBuilder($imageUrl, $imageUrl);


        // $imageMessageBuilder = new ImageMessageBuilder("https://upload.wikimedia.org/wikipedia/commons/d/de/POL_apple.jpg", "https://upload.wikimedia.org/wikipedia/commons/d/de/POL_apple.jpg");
        $response = $this->bot->pushMessage(env("USER_ID"), $imageMessageBuilder);

        return response()->json($path);



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
