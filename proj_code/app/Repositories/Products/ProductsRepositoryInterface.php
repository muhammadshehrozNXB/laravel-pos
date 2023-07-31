<?php

namespace App\Repositories\Products;

Interface ProductsRepositoryInterface
{

    public function allProducts();

    public function storeProducts($data);

    public function findProducts($id);

    public function updateProducts($data, $id);

    public function destroyProducts($id);
}
