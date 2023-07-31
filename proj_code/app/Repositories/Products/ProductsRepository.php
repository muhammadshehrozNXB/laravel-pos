<?php

namespace App\Repositories\Products;

use App\Repositories\Products\ProductsRepositoryInterface;
use App\Models\Products\ProductsModel;
use App\Models\ProductsType\ProductsTypeModel;

class ProductsRepository implements ProductsRepositoryInterface
{

    public function allProducts()
    {
        return ProductsTypeModel::join('tbl_products', 'tbl_products.product_type_id', '=', 'tbl_products_type.id')
            ->select('tbl_products.*', 'tbl_products_type.title as product_type_name')
            ->get();
    }

    public function storeProducts($data)
    {
        return ProductsModel::create($data);
    }

    public function findProducts($id)
    {
        return ProductsModel::find($id);
    }

    public function updateProducts($data, $id)
    {
        $prod = ProductsModel::find($id);
        $prod->product_type_id = $data['product_type_id'];
        $prod->title = $data['title'];
        $prod->save();
    }

    public function destroyProducts($id)
    {
        $category = ProductsModel::find($id);
        $category->delete();
    }
}
