<?php

namespace App\Http\Controllers;

use App\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        return Warehouse::with(["parcel", "product", "product.category"])->paginate(10);
    }
}
