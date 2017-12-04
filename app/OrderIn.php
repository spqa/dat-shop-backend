<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderIn extends Model
{
    protected $table = "orderin";
    protected $guarded = [];
    public $timestamps = false;

    public function orderInDetail() {
        return $this->hasOne(OrderInDetail::class, "OrdInID", "OrdInID");
    }
}
