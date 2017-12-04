<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\ResponseResult\ResultMessage;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return Category::all();
    }

    public function create(Request $request) {
        $result = new ResultMessage();
        try {
            $temp = Category::create($request->all());
            $result->setError(false);
            $result->setMessage("Add successfully!");
        } catch (\Exception $e) {
            $result->setError(true);
            $result->setMessage($e->getMessage());
        }

        return response()->json($result);
    }

    public function show($id)
    {
        return Category::where("CatID", $id)->first();
    }

    public function update($id,Request $request)
    {
        $result = new ResultMessage();
        try {
            $item = Category::find($id);
            $item->update($request->all());
            $result->setError(false);
            $result->setMessage("Update successfully!");
        } catch (\Exception $e) {
            $result->setError(true);
            $result->setMessage($e->getMessage());
        }

        return response()->json($result);
    }

    public function destroy($id)
    {
        $result = new ResultMessage();
        try {
            $item = Category::where("CatID",$id)->firstOrFail();
//            $test = Product::where("CatID", $item->CatID)->get();
            $test = $item->products()->first();
//            dd($test);
            if($test) throw new \Exception("This category has products");
            $item->delete();
            $result->setError(false);
            $result->setMessage("Delete successfully!");
        } catch (\Exception $e) {
            $result->setError(true);
            $result->setMessage($e->getMessage());
        }

        return response()->json($result);
    }
}
