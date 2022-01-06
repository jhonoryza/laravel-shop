<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\QueryBuilders\CategoryBuilder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
{
    public function index(CategoryBuilder $query): CategoryCollection
    {
        return (new CategoryCollection($query->paginate()));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category): CategoryResource
    {
        return (new CategoryResource($category));
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
