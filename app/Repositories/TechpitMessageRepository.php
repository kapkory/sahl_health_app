<?php


namespace App\Repositories;


use GuzzleHttp\Client;

class TechpitMessageRepository
{
    public $username = 'SAHL';
    public $password = '!Kitale2019';
    public $businessCode = 'TPL-SAH-013';
    public $token;
    public $externalBulkId;
    public $message;
    public $scheduleTime;
    public $addresses = [];
    public $client;
    public $baseUrl = 'http://196.13.121.195:9095/';


    public function __construct($config = []) {
        $client = new Client();
        $this->client = new Client(['baseUrl' => $this->baseUrl]);
    }

    public function addAddress($address) {
//        ArrayHelper::setValue($this->addresses,null,$address);
        $this->addresses[] = $address;
        return $this->addresses;
    }

    public function execute($message = null, $addresses = []) {
        $date = new DateTime();

        return $this->client->post('external-bulk/create', [
            'token' =>  base64_encode(hash('sha256', $this->username . $this->password . $date->getTimestamp(), true)),
            'timestamp' => $date->getTimestamp(),
            'business_code' => $this->businessCode,
            'external_bulk_id' => $this->generateUUID(),
            'message' => "test",
            'schedule_time' => date("Y-m-d H:i:s"),
            'addresses' => ['254712137367']
        ])->send();

//        return base64_encode(hash('sha256', $this->username . $this->password . $date->getTimestamp(), true));

        $data = [
            'token' => base64_encode(hash('sha256', $this->username . $this->password . $date->getTimestamp(), true)),
            'business_code' => $this->businessCode,
            'external_bulk_id' => rand(),
            'timestamp' => $date->getTimestamp(),
            'message' => $message,
            'schedule_time' => date("Y-m-d H:i:s"),
            'addresses' => ['254712137367'],
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->baseUrl . 'external-bulk/create');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        $results = curl_exec($ch);
        curl_close($ch);
        echo 'here';

        return $results;


    }

    public function getToken() {
        $date = new DateTime();
        return base64_encode(hash('sha256', $this->username . $this->password . $date->getTimestamp(), true));
    }
}
