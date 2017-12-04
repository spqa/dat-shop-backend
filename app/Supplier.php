<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "supplier";
    protected $guarded = [];
    public $timestamps = false;

    public function orderIn() {
        return $this->hasMany(Supplier::class, "SupID", "SupID");
    }
}
