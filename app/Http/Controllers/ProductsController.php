<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductsController extends Controller
{
    //ELOQUENT
    public function index() {
        $product = Product::all();
        return $product;
    }

    public function show($id) {
        $product = Product::where('id', $id)->get();
        return $product;
    }

    public function store(Request $request) {
        $product = Product::create($request->all());
        return [
            'message' => 'Producto creado correctamente'
        ];

    }

    public function update(Request $request, $id) {
        $product = Product::where('id', $id)
        ->update($request->all());

        return [
            'message' => 'Producto actualizado correctamente'
        ];

    }

    public function deleted($id) {
        $product = Product::where('id', $id)->delete();
        return [
            'message' => 'Producto eliminado correctamente'
        ];
    }
}
