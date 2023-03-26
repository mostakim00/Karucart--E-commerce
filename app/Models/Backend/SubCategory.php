<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_name',
        'sub_slug',
        'sub_image',
        'sub_status',
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
