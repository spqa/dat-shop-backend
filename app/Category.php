<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey="CatID";
    protected $keyType = "string";

    public function products() {
        return $this->hasMany(Product::class, 'CatID', 'CatID');
    }
}
