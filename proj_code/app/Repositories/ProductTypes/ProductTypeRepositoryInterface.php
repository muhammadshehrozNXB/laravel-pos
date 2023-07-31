<?php

namespace App\Repositories\ProductTypes;

Interface ProductTypeRepositoryInterface
{

    public function allProductTypes();

    public function storeProductTypes($data);

    public function findProductTypes($id);

    public function updateProductTypes($data, $id);

    public function destroyProductTypes($id);
}
