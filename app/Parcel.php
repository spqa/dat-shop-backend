<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    protected $table = "parcel";
    protected $guarded = [];
    public $timestamps = false;
    public $primaryKey = "ParID";

//    public function orderOutDetail() {
//        return $this->hasMany(OrderOutDetail::class, "ParID", "ParID");
//    }
//
//    public function orderInDetail() {
//        return $this->hasMany(OrderInDetail::class, "ParID", "ParID");
//    }

//    public function warehouses() {
//        return $this->hasMany(Warehouse::class, "ParID", "ParID");
//    }



}
