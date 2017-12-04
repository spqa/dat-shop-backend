<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderOut extends Model
{
    protected $table = "orderout";
    protected $guarded = [];
    public $timestamps = false;

    public function customer() {
        return $this->belongsTo(Customer::class, "CusID", "CusID");
    }

    public function orderOutDetail() {
        return $this->hasOne(OrderOutDetail::class, "OrdOutID","OrdOutID");
    }
}
