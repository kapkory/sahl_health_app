<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class MpesaRepository
{
  public function fetchAccessToken()
  {
      $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      $credentials = base64_encode('GNMVbSGO3o9uqtooSzJpPUQdKdCSGbtI:uCZDMafnnqhGppui');
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

      $curl_response = curl_exec($curl);
      $response = json_decode($curl_response);
      if ($response)
         $access_token = $response->access_token;
      else
         $access_token = $this->fetchAccessToken();

      return $access_token;
  }

  public function stkPush($payment_id,$phone,$amount){
    $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

      $timestamp = '20'.date("ymdhis");
    $stamp = (string)$timestamp;
    $pass = base64_encode("174379"."bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919".$stamp);

    $phone = preg_replace('/^\\D*/', '', $phone);
    $pay_url = url('api/reference?payment_id='.$payment_id);
//    $pay_url = 'https://qusoma.maviti.co.ke/api/reference?payment_id='.$payment_id;
//    $amount = '1';
    $curl_post_data = array(
        'BusinessShortCode' => 174379,
        'Password' => $pass,
        'Timestamp' => $timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $phone,
        'PartyB' => 174379,
        'PhoneNumber' => $phone,
        'CallBackURL' => $pay_url,
        'AccountReference' => 'Payment',
        'TransactionDesc' => 'Orders'
    );
//      DB::table('table_response')->insert(['response'=>$pay_url]);
    return $this->curlRequest($url,$curl_post_data);
  }

  public function curlRequest($url,$data){
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->fetchAccessToken())); //setting custom header

      $data_string = json_encode($data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
      $curl_response = curl_exec($curl);
      return $curl_response;
  }


}
