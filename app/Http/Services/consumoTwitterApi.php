<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class consumoTwitterApi{

    private $url;
    private $count;
    private $query;
    private $token;

    function __construct($url,$count,$query){
        $this->url = $url;
        $this->count  = $count;
        $this->query = $query;
    }
    public function recuperarTweets(){
        // Generar webToken de twitter para consumir servicios del api
        $token = $this->ConsumirWebService(
            "POST",
            "https://api.twitter.com/oauth2/token",
            [
                "Accept: */*",
                "Accept-Encoding: gzip, deflate",
                "Authorization: Basic WFhmVHJYS3VFa2xEYUI0ZG9zbm5JUWRsMDpKb0U4eGo0dmVNb2ZkRmJ3ajdOTXNYRVZIYkVPWHdHQWFwQW5Ib1o0VkRDeTVxaHpsNA==",
                "Content-Type: application/x-www-form-urlencoded"
            ],
            "grant_type=client_credentials"
        );
        // Se retorna la consulta del web service buscando los tweets que cumplen con el criterio
        return $this->ConsumirWebService(
           "GET",
           $this->url."?q=".$this->query."&count=".$this->count,
            [
                "Accept: */*",
                'Authorization: Bearer '.$token->access_token,
            ]
        );
    }

    /**
     * Metodo para consumir web services
     */
    public function ConsumirWebService($tipo,$url,$cabeceras,$body = "")
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $tipo,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => $cabeceras,
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
