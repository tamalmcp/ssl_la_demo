<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::latest()->get();
        return response()->json($users, 200);
    }

    public function view($id)
    {
        $user = User::find($id);
        return response()->json($user, 200);
    }

    public function products()
    {
        $products = Product::latest()->get();
        return response()->json($products, 200);
    }

    public function product_create(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'detail' => $request->detail,
        ]);
        return response()->json('success', 200);
    }

    public function delete_product($id)
    {
        $product_by_id = Product::findOrFail($id);
        if($product_by_id){
            $product_by_id->delete();
            return response()->json('success', 200);
        }else{
            return response()->json('failed', 404);
        }
    }
}
