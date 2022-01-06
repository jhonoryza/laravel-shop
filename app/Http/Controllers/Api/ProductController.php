<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\QueryBuilders\ProductBuilder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductBuilder $query): ProductCollection
    {
        return (new ProductCollection($query->paginate()));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product): ProductResource
    {
        return (new ProductResource($product));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
