<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'product_code',
        'product_name',
        'product_slug',
        'product_price',
        'discount_price',
        'quantity',
        'cat_id',
        'subcat_id',
        'thumbnails',
        'status',
        'short_desc',
        'long_desc',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id', 'id');
    }

    //count product of each subcategory
    public static function subProductCount($subcat_id)
    {
        $subproductcount = Product::where('subcat_id', $subcat_id)->where('status', 1)->count();
        return $subproductcount;
    }
}
