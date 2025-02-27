<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // public function index(Request $request)
    //     {
    //         $search = $request->get('search');
    //         $products = Product::where('name', 'like', "%{$search}%")->paginate(10);
    //         return view('products.index', ['products' => $products]);
    //     }

    //     public function create()
    //     {
    //         return view('products.create');
    //     }

    //     public function store(Request $request)
    //     {
    //         $request->validate([
    //             'name' => 'required|max:255',
    //             'description' => 'nullable',
    //             'price' => 'required|numeric|min:0',
    //         ]);

    //         Product::create($request->all());

    //         return redirect()->route('products.index');
    //     }

    //     public function edit(Product $product)
    //     {
    //         return view('products.edit', compact('product'));
    //     }

    //     public function update(Request $request, Product $product)
    //     {
    //         $request->validate([
    //             'name' => 'required|max:255',
    //             'description' => 'nullable',
    //             'price' => 'required|numeric|min:0',
    //         ]);

    //         $product->update($request->all());

    //         return redirect()->route('products.index');
    //     }

    //     public function destroy(Product $product)
    //     {
    //         $product->delete();

    //         return redirect()->route('products.index');
    //     }

    //     public function search(Request $request)
    //     {
    //         $search = $request->get('search');
    //         $products = Product::where('name', 'like', "%{$search}%")->paginate(10);
    //         return view('products.index', ['products' => $products]);
    //     }

    public function index(Request $request)
        {
            $query = Product::query();

            if ($request->has('search')) {
                $query->where('name', 'like', '%' . $request->input('search') . '%');
            }

            $products = $query->paginate(5);

            return view('products.index', compact('products'));
        }

        public function create()
        {
            return view('products.create');
        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
                'price' => 'required|numeric',
            ]);

            Product::create($validatedData);

            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        }

        public function edit(Product $product)
        {
            return view('products.edit', compact('product'));
        }

        public function update(Request $request, Product $product)
        {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
                'price' => 'required|numeric',
            ]);

            $product->update($validatedData);

            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        }

        public function destroy(Product $product)
        {
            $product->delete();

            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        }
}
