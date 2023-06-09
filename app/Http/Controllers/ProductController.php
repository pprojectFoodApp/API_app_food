<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json(['message' => 'Products retrieved', 'products' => $products]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json(['message' => 'Product retrieved', 'product' => $product]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foodname' => 'required|max:255',
            'image' => 'required|url',
            'description' => 'required',
            'ingredient' => 'required',
            'recipe' => 'required',
        ]);
        $product = Product::create($validatedData);
        return response()->json(['message' => 'Product created', 'product' => $product], 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $validatedData = $request->validate([
            'foodname' => 'required|max:255',
            'image' => 'required|url',
            'description' => 'required',
            'ingredient' => 'required',
            'recipe' => 'required',
        ]);
        $product->foodname = $validatedData['foodname'];
        $product->image = $validatedData['image'];
        $product->description = $validatedData['description'];
        $product->ingredient = $validatedData['ingredient'];
        $product->recipe = $validatedData['recipe'];
        $product->save();
        return response()->json(['message' => 'Product updated', 'product' => $product]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}