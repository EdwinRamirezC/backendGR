<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;

class TweetController extends Controller
{
    /**
     * metodo para almacenar tweets
     */
    public function store(TweetRequest $request){
        dd($request->var1);
    }
}
