<?php

namespace App\Http\Controllers;

use App\Http\ResponseResult\ResultMessage;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return Product::with(["category", "warehouses"])->paginate(10);
    }

    public function create(Request $request) {
        $result = new ResultMessage();
        try {
            Product::create($request->all());
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
        return Product::findOrFail($id);
    }

    public function update($id,Request $request)
    {
        $result = new ResultMessage();
        try {
            $item = Product::find($id);
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
            $item = Product::find($id);
            $test = $item->orderOutDetail()->first();
            if($test) throw new \Exception("This product has orders!!");
            $result->setError(false);
            $result->setMessage("Update successfully!");
        } catch (\Exception $e) {
            $result->setError(true);
            $result->setMessage($e->getMessage());
        }

        return response()->json($result);
    }
}
