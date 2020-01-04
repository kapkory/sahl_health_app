<?php


namespace App\Repositories;


use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;

class TechpitMessageRepository implements ShouldQueue
{
    public $username = 'SAHL';
    public $password = '!Kitale2019';
    public $businessCode = 'TPL-SAH-013';
    public $shortCode = 'SAHL-HEALTH';
    public $token;
    public $externalBulkId;
    public $message;
    public $scheduleTime;
    public $addresses = [];
    public $client;
    public $baseUrl = 'http://196.13.121.195:9095/';

    public function execute($message, $addresses = []) {

        $timestamp= Carbon::now('Africa/Nairobi')->format('YmdHis');
        $data =  [
            'token' => $this->getToken($timestamp),
            'timestamp' => $timestamp,
            'business_code' => $this->businessCode,
            'short_code' => $this->shortCode,
            'external_bulk_id' => Str::random(14),
            'message' => $message,
            'schedule_time' => Carbon::now('Africa/Nairobi')->format("Y-m-d H:i:s"),
            'addresses' => $addresses
        ];

        $client = new Client();
        $response =  $client->post($this->baseUrl.'/external-bulk/create', [
            'json' =>$data,
        ]);

        return json_decode((string) $response->getBody(), true);

    }

    public function getToken($timestamp) {
        return base64_encode(hash('sha256', $this->username . $this->password . $timestamp));
    }
}
