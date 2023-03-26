<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pro_id',
    ];
    public function product(){
        return $this->belongsTo(Product::class,'pro_id','id');
    }
}
