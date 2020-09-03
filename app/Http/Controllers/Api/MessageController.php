<?php

namespace App\Http\Controllers\Api;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Log;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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


        $lastMessage = $request['events'][0]['message']['text'];
        $lastMessageLineID = $request['events'][0]['source']['userId'];
        // reply token is used for replying message
        // $lastReplyToken = $request['events'][0]['replyToken'];


        // Create the user info when the message is come from the userID that doesn't exist in the database
        // Check the Line id is already exist or not
        $lineIDs= UserInfo::where('lineID', $lastMessageLineID)->count();
        // if this line id is not in the database, add this user to the database with lineID and the name with the null value
        if($lineIDs == 0){
            $user_data = [
                'lineID' =>$lastMessageLineID,

            ];
            // Create the user
            $User = UserInfo::create($user_data);

        }
        // log out the last message
        Log::channel('messageLog')->info($lastMessage);
        // log  out the message detail
        Log::channel('lineBotLog')->info($request->all());
        // return the message detail
        return($request->all());



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
