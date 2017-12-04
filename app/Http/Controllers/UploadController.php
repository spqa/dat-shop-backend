<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request) {
        $path = $request->file('image')->store('image', "public");
        $url = Storage::url($path);
        return response()->json(['image'=>$url]);
    }
}
