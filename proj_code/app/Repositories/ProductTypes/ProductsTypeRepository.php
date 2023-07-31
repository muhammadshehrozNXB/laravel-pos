<?php

namespace App\Repositories\ProductTypes;

use App\Repositories\ProductTypes\ProductTypeRepositoryInterface;
use App\Models\ProductsType\ProductsTypeModel;

class ProductsTypeRepository implements ProductTypeRepositoryInterface
{

    public function allProductTypes()
    {
        return ProductsTypeModel::all();
    }

    public function storeProductTypes($data)
    {
        return ProductsTypeModel::create($data);
    }

    public function findProductTypes($id)
    {
        return ProductsTypeModel::find($id);
    }

    public function updateProductTypes($data, $id)
    {
        $category = ProductsTypeModel::find($id);
        $category->title = $data['title'];
        $category->save();
    }

    public function destroyProductTypes($id)
    {
        $category = ProductsTypeModel::find($id);
        $category->delete();
    }
}
