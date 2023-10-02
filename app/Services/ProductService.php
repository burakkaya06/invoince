<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductService
{

    public function saveProduct(Request $request)
    {
        $data = $request->validate([
            'product_id_name' => 'required|string',
            'product_name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);


        Product::create($data);

    }

    public function getAllProduct(Request $request)
    {
        $query = $request->query('query');

        if($query) {
            $product = Product::where('product_name', 'like', "%{$query}%")
                ->orWhere('product_id_name', 'like', "%{$query}%")
                ->orderBy('id', 'desc')
                ->paginate(5)->appends(request()->query());
        } else {
            $product = Product::orderBy('id', 'desc')
                ->paginate(5);
        }
        return $product;
    }

    public function getProductById($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    public function updateProduct(Request $request, $id) {

        $customer = Product::findOrFail($id);
        $customer->update($request->only('product_name', 'description', 'price'));
    }

    public function deleteProduct($id)
    {
        $customer = Product::findOrFail($id);
        $customer->delete();
    }

}
