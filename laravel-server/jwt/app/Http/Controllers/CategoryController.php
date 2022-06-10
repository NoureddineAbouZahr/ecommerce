<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;


class CategoryController extends Controller
{public function getAllCategories($id = null){
    if($id != null){
        $cats = Category::find($id);

    }else{
        $cats = Category::all();
    }
    
    return response()->json([
        "status" => "Success",
        "restos" => $cats
    ], 200);
}
    public function addCategory(Request $request){
        $cat = new Category;
        $cat->name = $request->name;
        $cat->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
