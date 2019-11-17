<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;
use  App\Models\Tweet;
use App\Http\Services\consumoTwitterApi;
use DB;

class TweetController extends Controller
{
    /**
     * metodo para almacenar tweets
     */
    public function store(TweetRequest $request)
    {
        dd($request->all());
        // Proceso de guardado de Tweet en la base de datos
        try{
            // se activan las transacciones al proceso de guardado
            DB::beginTransaction();
            // se guarda o actualiza el tweet si existe
            Tweet::updateOrCreate(['id_tweet'=>$request['id_tweet']],$request);
            // se guardan los cambios en la base de datos por medio del commit
            DB::commit();
        }catch(\Exception $e){
            // si se identifica un error se realiza el pertinente rollback
            DB::rollback();
            return response()->json(" Error al guardar la valoracion del Tweet",422);
        }
    }

    /**
     * metodo para buscar los tweets en la api de twitter
     */
    public function searchTweets($consulta)
    {
        // se reemplazan los espacios y los Hashtag por sus correspondientes URL # = %23 y ' ' = %20
        $consulta = str_replace('#','%23',$consulta);
        $consulta = str_replace(' ','%20',$consulta);
        // Se busca el en el api de twitter los tweets relacionados con el criterio de busqueda $consulta
        $json = new consumoTwitterApi("https://api.twitter.com/1.1/search/tweets.json","4", $consulta);
        // Se retornan los resultados de la busqueda
        return response()->json($json->recuperarTweets(),200);
    }
}
