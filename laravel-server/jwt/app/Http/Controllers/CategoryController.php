<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;


class CategoryController extends Controller
{public function getAllCategories($id = null){
    if($id != null){
        $cats = Categorie::find($id);

    }else{
        $cats = Categorie::all();
    }
    
    return response()->json([
        "status" => "Success",
        "restos" => $cats
    ], 200);
}
    public function addCategory(Request $request){
        $cat = new Categorie;
        $cat->name = $request->name;
        $cat->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
