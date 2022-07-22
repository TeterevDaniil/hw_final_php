<?php

namespace App\Http\Controllers;

use App\Category;
use App\Models\ShopModel;
use App\Models\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{
    public function index()
    {
        $modal = new ShopModel;
        $category = $modal->getCategoryes();
        $products = $modal->getProducts();
        return view('app/index', [
            'categoryes' => $category,
            'products' => $products
        ]);
    }

    public function categoryes()
    {
        $category = Category::query()->inRandomOrder()->get();
    }
    public function category($id)
    {
        $modal = new ShopModel;
        $category = $modal->getCategory($id);
        $categoryes = $modal->getCategoryes();
        $products = $modal->getProductsInCategory($id);
        return view('app/category', [
            'categoryes' => $categoryes,
            'category' => $category,
            'products' => $products
        ]);
    }
    public function products()
    {
        $category = Category::query()->inRandomOrder()->get();
    }
    public function product($id)
    {
        $modal = new ShopModel;
        $limit = 3;
        $offset = 0;
        $productWithCat = $modal->getProductWithCategory($limit, $offset, $id);
        $products = $modal->getProducts($limit);
        $categoryes = $modal->getCategoryes();
        return view('app/1product', [
            'categoryes' => $categoryes,
            'products' => $products,
            'prod' => $productWithCat
        ]);
    }

    public function buyProduct($id)
    {
        $modal = new ShopModel;
        $limit = 3;
        $offset = 0;
        $user = auth()->user();
        $categoryes = $modal->getCategoryes();
        $productWithCat = $modal->getProductWithCategory($limit, $offset, $id);
        return view('app/cart2', [
            'categoryes' => $categoryes,
            'user' => $user,
            'prod' => $productWithCat
        ]);
    }

    public function addOrder()
    {
      
       $name = trim($_POST['name']);
       $email = trim($_POST['email']);
       $product_id = $_POST['product_id'];
       $user = auth()->user();
       $modal = new ShopModel;
       $product = $modal->getProduct($product_id);
   
       $userData = [
        'image'=>$product->image,
        'user_id' => $user->id,
        'product' => $product->name,
        'email' => $email,
        'price' => $product->price,
        'product_id' => $product_id,
        'user_name' => $name,
      ];
    $user = new Order($userData);
    $user->save();
    $adminEmail = new User;
    $adminEmail = $adminEmail->getAdminEmail();
    $admin =  $adminEmail->email;
    Mail::raw('Пользователь: ' .$email.' отправил заказ на: '. $product->name, function ($message)use ($admin) {
        $message->from('testsmtp@abaplus.pro', 'Laravel');
        $message->to ($admin,$name = null);
        $message->subject('Вы получили новый заказ');
    });
     return response(['result' =>  'Благодарим за обращение,с Вами свяжутся в ближайшее время']);
     }

    public function myOrder()
    {   $user = auth()->user();
        $order = new ShopModel();
        $categoryes = $order->getCategoryes();
        $orders = $order-> getUserOrders($user->id);
         return view('app/cart1', [
            'categoryes' => $categoryes,
            'orders' => $orders       
         ]);
    }
}
