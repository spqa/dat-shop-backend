<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderInDetail extends Model
{
    protected $table = "orderindetail";
    protected $guarded = [];
    public $timestamps = false;

    public function orderIn() {
        return $this->belongsTo(OrderIn::class, "OrdOInID", "OrdInID");
    }

    public function parcel() {
        return $this->belongsTo(Parcel::class, "ParID","ParID");
    }

    public function product() {
        return $this->hasOne(Product::class, "ProID", "ProID");
    }
}
