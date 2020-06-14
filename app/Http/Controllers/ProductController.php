<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Controller dos produtos
    public function index()
    {
        $user = Auth::user();
        return view('products', ['user' => $user]);
        
    }
    public function show()
    {
        $products = Product::all();
        return ($products);
    }
    public function store(Request $request)
    {
        
        $product = new Product();
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->user = $request->user;
        $product->save();
    }
    public function edit(Product $product, Request $request)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
    }
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
