<?php

namespace App\Http\Clases;

class consumoTwitterApi{

    private $url;
    private $count;
    private $query;

    function __construct($url,$count,$query){
        $this->url = $url;
        $this->count  = $count;
        $this->query = $query;
    }
    public function recuperarTweets(){
        // dd($this->url."?q=".$this->query."&count=".$this->count);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.twitter.com/1.1/search/tweets.json?q=mundo&count=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            'Authorization: OAuth oauth_consumer_key="XXfTrXKuEklDaB4dosnnIQdl0",oauth_token="1194832845526700032-3qllqrWZ2oLRcw6n9PuDq7JHeiXfAK",oauth_signature_method="HMAC-SHA1",oauth_timestamp="1573917743",oauth_nonce="tyxiaVFZ6BT",oauth_version="1.0",oauth_signature="N8zjobPOMeHE1IvaDumnYbh04L4%3D"',
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Type: application/x-www-form-urlencoded",
            "Host: api.twitter.com",
            "cache-control: no-cache"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }
}
