<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class redirectController extends Controller
{
    public function notFound(){
        return response()->json([
            "status" => "Failure",
            "message" => "STOP Messing Around"
        ], 404);
    }
    public function notloggedin(){
        return response()->json([
            "status" => "Failure",
            "message" => "You should log in to add to favorites"
        ], 404);
    }
}
