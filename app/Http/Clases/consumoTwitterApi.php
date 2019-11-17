<?php

namespace App\Http\Clases;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class consumoTwitterApi{

    private $url;
    private $count;
    private $query;

    function __construct($url,$count,$query){
        $this->url = $url;
        $this->count  = $count;
        $this->query = $query;
    }
    
    public function recuperarTweets()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url."?q=".$this->query."&count=".$this->count,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAMuPAwEAAAAAfaIshtiI9AXY6wFbQD1g3fCnsSQ%3DB8Sp5TkvmDl2hhl0DpRjGIonBjuILttkvGXw7Mtn9rf6580NIQ',
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }
}
