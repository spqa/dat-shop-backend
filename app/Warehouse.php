<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = "warehouse";
    protected $guarded = [];
    public $timestamps = false;

    public function parcel() {
        return $this->belongsTo(Parcel::class, "ParID");
    }

    public function product() {
        return $this->belongsTo(Parcel::class, "ParID");
    }
}
