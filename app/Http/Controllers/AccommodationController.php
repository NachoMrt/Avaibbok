<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Accommodation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\VerificationController;

class AccommodationController extends Controller
{

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Auth::user();
        
        $alojamientos= DB::table('accommodations')  // Cogo valores de tabla alojamientos del usuario logeado
            ->select(['id','accommodation_name','accommodation_type','distributionn','max_guests','updated_at'])
            //where('user_id', '=', $cliente->id)
            ->where('user_id', '=', 'id',$cliente)
            ->get();
          
        $json = json_encode($alojamientos);  // transformo datos en json
        echo($json);   // muestro datos
       
        if($alojamientos == null) {   // Respuestas 
            return response()->json([
                'message' => 'Bad Request'
            ],400);
        } else {
            return response()->json([
                'message' => 'OK'
            ],200);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trade = $_POST["trade_name"];  // Cogo valores del formulario
        $type = $_POST["type"];
        $liv = $_POST["living"];
        $room = $_POST["bedroom"];
        $bed = $_POST["bed"];
        $guest = $_POST["guest"];
        $salto = "";

        $params = array(  // creo array de valores formulario
            "trade_name" => $trade,
            "type" => $type,
            "living_rooms" => $liv,
            "bedrooms" => $room,
            "bed" => $bed,
            "max_guests" => $guest
        );

        $json = json_encode($params);  // transformo datos en json
        echo $json;  // lo muestro

        if($params == null) {  // Respuestas
            return response()->json([
                'message' => 'Bad Request'
            ],400);
        } else {
            return response()->json([
                'message' => 'OK'
            ],200);
        }
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $id = $_POST["id"];   // cogo valores formulario
        $trade2 = $_POST["trade_name2"];
        $type2 = $_POST["type2"];
        $liv2 = $_POST["living2"];
        $room2 = $_POST["bedroom2"];
        $bed2 = $_POST["bed2"];
        $guest2 = $_POST["guest2"];
        $salto = "";

        $params2 = array(  // creo array con valores formulario
            "id" => $id,
            "trade_name" => $trade2,
            "type" => $type2,
            "living_rooms" => $liv2,
            "bedrooms" => $room2,
            "bed" => $bed2,
            "max_guests" => $guest2
        );

        $json2 = json_encode($params2);  // convierto en json valores formulario
        echo $json2;   // muestro valores

        if($params2 == null) {  // Respuestas
            return response()->json([
                'message' => 'Bad Request'
            ],400);
        } else {
            return response()->json([
                'message' => 'OK'
            ],200);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accommodation $accommodation)
    {
        //
    }


}
