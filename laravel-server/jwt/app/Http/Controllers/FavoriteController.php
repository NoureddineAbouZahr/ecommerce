<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function addFav(Request $request){
        $Fav = new Favorite;
        $Fav->u_id = $request->uid;
        $Fav->item_id = $request->item_id;
        $Fav->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }



    public function remove_favorite(Request $request){
        $deleted = DB::table('favorites')->where('u_id','=',$request->uid)      
                                         ->where('item_id','=',$request->item_id);
        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
