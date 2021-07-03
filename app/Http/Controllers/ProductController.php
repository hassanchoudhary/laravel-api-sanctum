<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json(['products'=>$products], 200);
    }

    public function show($id)
    {
        $products = Product::find($id);
        if($products)
        {
            return response()->json(['products'=>$products], 200);
        }
        else
        {
            return response()->json(['message'=>'no record found'], 404);
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:101',
            'description'=> 'required|max:101',
            'price'=> 'required|max:101',
            'qty'=> 'required|max:101',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        return response()->json(['message' => 'Product Added Succesfully'],200);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|max:101',
            'description'=> 'required|max:101',
            'price'=> 'required|max:101',
            'qty'=> 'required|max:101',
        ]);

        $product = Product::find($id);
        if($product)
        {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->update();
        return response()->json(['message' => 'Product update Succesfully'],200);
        }
        else
        {
            return response()->json(['message' => 'no record found'],404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product)
        {
            $product->delete();
            return response()->json(['message' => 'Product delete Succesfully'],200);
        }
        else
        {
            return response()->json(['message' => 'no record found'],404);
        }
    }

}
