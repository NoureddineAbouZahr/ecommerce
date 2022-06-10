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
}
