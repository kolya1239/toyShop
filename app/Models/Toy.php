<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Toy extends Model implements Buyable
{
    use HasFactory, SoftDeletes;

    protected $table = "toys";
    protected $guarded = false;

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function materials(){
        return $this->belongsToMany(Material::class);
    }

    public function getBuyableIdentifier($options = null){
        return $this->id;
    }
    public function getBuyableDescription($options = null){
        return $this->name;
    }
    public function getBuyablePrice($options = null){
        return $this->price;
    }
    public function getBuyableWeight($options = null){
        return 0;
    }
    
}
