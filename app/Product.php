<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey="ProID";
    protected $keyType = "string";

    public function orderOutDetail() {
        return $this->hasMany(OrderOutDetail::class, "ProID", "ProID");
    }

    public function orderInDetail() {
        return $this->hasMany(OrderInDetail::class, "ProID", "ProID");
    }

    public function warehouses() {
        return $this->hasMany(Warehouse::class, "ProID", "ProID");
    }

    public function category() {
        return $this->belongsTo(Category::class, "CatID", "CatID");
    }
}
