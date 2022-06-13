<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Category;


class ItemController extends Controller
{
    public function getAllItems($id = null){
        if($id != null){
            $items = Item::find($id);
        }else{
            $items = Item::all();
        }
        
        return response()->json([
            "status" => "Success",
            "Items" => $items
        ], 200);
    }

    public function getItemByName($name){
        $item = Item::where("name", "LIKE", "%$name%")->get();
        
        return response()->json([
            "status" => "Success",
            "results" => $item
        ], 200);
    }
    public function getItemByCategoryId($cid){
        $item = Item::where("cat_id", "=", "$cid"
        
        
        
        
        )->get();
        
        return response()->json([
            "status" => "Success",
            "results" => $item
        ], 200);
    }

    public function addItem(Request $request){
        $I = new Item;
        $I->name = $request->name;
        $I->description = $request->description;
        $I->price = $request->price;
        $I->img = $request->img;
        $I->cat_id = $request->cat_id;
        $I->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }

    public function getAllItems_WithCatName($cid = null){
        $items = DB::table('items')
        ->join('categories','items.cat_id','=','categories.id')
        ->select('items.name','items.description','items.price','categories.name')
        ->get();
        
        return response()->json([
            "status" => "Success",
            "Items" => $items
        ], 200);
    }
}
