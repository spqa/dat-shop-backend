<?php

namespace App\Http\Controllers;

use App\Parcel;

class ParcelController extends Controller
{
    public function index()
    {
        return Parcel::all();
    }
}
