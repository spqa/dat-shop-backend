<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";
    protected $guarded = [];
    public $timestamps = false;
    public $primaryKey = "CusID";

    public function orderOut() {
        return $this->hasMany(OrderOut::class, "CusID", "CusID");
    }
}
