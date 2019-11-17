<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;
use  App\Models\Tweet;
use App\Http\Clases\consumoTwitterApi;

class TweetController extends Controller
{
    /**
     * metodo para almacenar tweets
     */
    public function store(TweetRequest $request)
    {
        // $json = new consumoTwitterApi("https://api.twitter.com/1.1/search/tweets.json","3","mundo");
        dd("objetoJson");
        dd($request->var1);
    }

    /**
     * metodo para buscar los tweets en la api de twitter
     */
    public function searchTweets($hashtag)
    {
        $json = new consumoTwitterApi("https://api.twitter.com/1.1/search/tweets.json","3", $hashtag);
        return response()->json($json->recuperarTweets());
    }
}
