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
        return $this->belongsTo(OrderOutDetail::class, "ParID", "ParID");
    }

    public function orderInDetail() {
        return $this->belongsTo(OrderInDetail::class, "ParID", "ParID");
    }

    public function warehouses() {
        return $this->belongsTo(Warehouse::class, "ParID", "ParID");
    }

    public function category() {
        return $this->belongsTo(Category::class, "CatID", "CatID");
    }
}
