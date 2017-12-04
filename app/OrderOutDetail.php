<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderOutDetail extends Model
{
    protected $table = "orderoutdetail";
    protected $fillable = ["OrdOutID", "ProID", "ParID", "Quantity"];
    public $timestamps = false;

    public function orderOut() {
        return $this->belongsTo(OrderOut::class, "OrdOutID", "OrdOutID");
    }

    public function parcel() {
        return $this->belongsTo(Parcel::class, "ParID","ParID");
    }

    public function product() {
        return $this->hasOne(Product::class, "ProID", "ProID");
    }
}
