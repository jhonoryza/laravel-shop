<?php

namespace App\QueryBuilders;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

final class ProductBuilder extends Builder
{
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->builder = QueryBuilder::for(Product::class, $request);
    }

    /**
     * Get a list of allowed columns that can be selected.
     *
     * @return string[]
     */
    protected function getAllowedFields(): array
    {
        return [
            'products.id',
            'products.category_id',
            'products.sku',
            'products.slug',
            'products.name',
            'products.description',
            'products.price',
            'products.disc_price',
            'products.stock',
            'products.weight',
            'products.sold_count',
            'products.published_at',
            'products.created_at',
            'products.updated_at',
            'category.id',
            'category.name',
            'category.slug',
            'category.published_at',
            'category.created_at',
            'category.updated_at',
        ];
    }

    /**
     * Get a list of allowed columns that can be used in any filter operations.
     *
     * @return array
     */
    protected function getAllowedFilters(): array
    {
        return [
            AllowedFilter::exact('id'),
            AllowedFilter::exact('category_id'),
            'sku',
            'slug',
            'name',
            'description',
            AllowedFilter::exact('price'),
            AllowedFilter::exact('disc_price'),
            AllowedFilter::exact('stock'),
            AllowedFilter::exact('weight'),
            AllowedFilter::exact('sold_count'),
            AllowedFilter::exact('published_at'),
            AllowedFilter::exact('created_at'),
            AllowedFilter::exact('updated_at'),
            AllowedFilter::exact('products.id'),
            AllowedFilter::exact('products.category_id'),
            'products.sku',
            'products.slug',
            'products.name',
            'products.description',
            AllowedFilter::exact('products.price'),
            AllowedFilter::exact('products.disc_price'),
            AllowedFilter::exact('products.stock'),
            AllowedFilter::exact('products.weight'),
            AllowedFilter::exact('products.sold_count'),
            AllowedFilter::exact('products.published_at'),
            AllowedFilter::exact('products.created_at'),
            AllowedFilter::exact('products.updated_at'),
            AllowedFilter::exact('category.id'),
            'category.name',
            'category.slug',
            AllowedFilter::exact('category.published_at'),
            AllowedFilter::exact('category.created_at'),
            AllowedFilter::exact('category.updated_at'),
        ];
    }

    /**
     * Get a list of allowed relationships that can be used in any include operations.
     *
     * @return string[]
     */
    protected function getAllowedIncludes(): array
    {
        return [
            'category',
        ];
    }

    /**
     * Get a list of allowed searchable columns which can be used in any search operations.
     *
     * @return string[]
     */
    protected function getAllowedSearch(): array
    {
        return [
            'sku',
            'slug',
            'name',
            'description',
            'category.name',
            'category.slug',
        ];
    }

    /**
     * Get a list of allowed columns that can be used in any sort operations.
     *
     * @return string[]
     */
    protected function getAllowedSorts(): array
    {
        return [
            'id',
            'category_id',
            'sku',
            'slug',
            'name',
            'description',
            'price',
            'disc_price',
            'stock',
            'weight',
            'sold_count',
            'published_at',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * Get the default sort column that will be used in any sort operation.
     *
     * @return string
     */
    protected function getDefaultSort(): string
    {
        return 'id';
    }
}
