<?php

namespace App\Models;

use App\Category;
use App\Order;
use App\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'imgage',
        'category_id'
    ];


    use HasFactory;
    public function getCategory(int $id)
    {
        return $category = Category::query()->where('id', '=', $id)->first();;
    }

    public function getProduct($id)
    {
        return $products = Product::query()->where('id', '=', $id)->first();
    }
    public function getProducts($limit = 6)
    {
        return $products = Product::query()->limit($limit)->get();
    }
    public function getProductsInCategory($id)
    {
        return $products = Product::query()->where('category_id', '=', $id)->get();
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getProductWithCategory(int $limit = 10, int $offset = 0, $id)
    {

        return self::with('category')
            ->where('id', $id)
            ->limit($limit)
            ->offset($offset)
            ->orderBy('id', 'DESC')
            ->get();
    }
    public function getCategoryes()
    {
        return $categoryes = Category::query()->get();
    }

    public function getUserOrders(int $user_id,int $limit = 10)
    {
        return Order::query()->where('user_id', '=', $user_id)->get();
         
    }
}
