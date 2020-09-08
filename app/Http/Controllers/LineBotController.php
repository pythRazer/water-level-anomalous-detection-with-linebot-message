<?php

namespace App\Http\Controllers;

use Exception;
use LINE\LINEBot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LINE\LINEBot\SignatureValidator;
use LINE\LINEBot\Constant\HTTPHeader;
use Illuminate\Support\Facades\Storage;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;

use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;


class LinebotController extends Controller
{

    protected $httpClient;
    protected $bot;

    // $httpClient = new CurlHTTPClient(env("CHANNEL_TOKEN")); // TOKEN
    // $bot = new LINEBot($httpClient, ['channelSecret' => env("CHANNEL_SECRET")]);// SECRET

    function __construct()
    {
        $this->httpClient = new CurlHTTPClient(env("CHANNEL_TOKEN"));;
        $this->bot = new LINEBot($this->httpClient, ['channelSecret' => env("CHANNEL_SECRET")]);
    }
    public function getAbnormalWaterLevel()
    {

    }

    public function pushMessage()
    {


        $textMessageBuilder = new TextMessageBuilder('hello');
        $response = $this->bot->pushMessage(env("USER_ID"), $textMessageBuilder);
        return redirect()->back();

        // echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
    }

    // storage/abnormal_water_level_image/messageImage_1599530072011.jpg
    public function pushImage()
    {

        $imageUrl = secure_asset('abnormal_water_level_image/messageImage_1599530072011.jpg');
        // Example from line official documentation site: https://developers.line.biz/en/reference/messaging-api/#send-push-message
        $imageMessageBuilder = new ImageMessageBuilder($imageUrl, $imageUrl);


        // $imageMessageBuilder = new ImageMessageBuilder("https://upload.wikimedia.org/wikipedia/commons/d/de/POL_apple.jpg", "https://upload.wikimedia.org/wikipedia/commons/d/de/POL_apple.jpg");
        $response = $this->bot->pushMessage(env("USER_ID"), $imageMessageBuilder);
        return redirect()->back();

        // echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

    }



    public function pushLocation()
    {

        // Example from line official documentation site: https://developers.line.biz/en/reference/messaging-api/#send-push-message

        // title, address, lat, lon
        $locationMessageBuilder = new LocationMessageBuilder("my location", "〒150-0002 東京都渋谷区渋谷２丁目２１−１", 35.65910807942215, 139.70372892916203);
        $response = $this->bot->pushMessage(env("USER_ID"), $locationMessageBuilder);
        return redirect()->back();

        // echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

    }

    // reply message function requires webhook
    public function sendReplyMessage()
    {

        $textMessageBuilder = new TextMessageBuilder('Reply');
        // $replyToken = $bot->getEve()
        $response = $this->bot->replyMessage('<replyToken>', $textMessageBuilder);
        return redirect()->back();

        echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
    }


    // create signature

    //     $channelSecret = '...'; // Channel secret string
    // $httpRequestBody = '...'; // Request body string
    // $hash = hash_hmac('sha256', $httpRequestBody, $channelSecret, true);
    // $signature = base64_encode($hash);
    // // Compare X-Line-Signature request header string and the signature


    // get content
    public function getMessage()
    {
        $httpClient = new CurlHTTPClient(env("CHANNEL_TOKEN")); // TOKEN
        $bot = new LINEBot($httpClient, ['channelSecret' => env("CHANNEL_SECRET")]); // SECRET

        $response = $bot->getMessageContent('<messageId>');
        echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
        // if ($response->isSucceeded()) {
        //     $tempfile = tmpfile();
        //     fwrite($tempfile, $response->getRawBody());
        // } else {
        //     error_log($response->getHTTPStatus() . ' ' . $response->getRawBody());
        // }

        // $textMessageBuilder = new TextMessageBuilder('Reply');
        // $response = $bot->replyMessage('<replyToken>', $textMessageBuilder);

        // echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

    }

    // public function manageMessage(){
    //     $row_per_page = 10;
    //     $MessagePaginate = UserInfo::OrderBy("created_at", 'desc')->paginate($row_per_page);
    //     return view('');

    // }






}
