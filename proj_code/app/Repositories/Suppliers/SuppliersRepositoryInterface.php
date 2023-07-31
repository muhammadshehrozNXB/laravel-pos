<?php

namespace App\Repositories\Suppliers;

Interface SuppliersRepositoryInterface
{

    public function allSuppliers();

    public function storeSuppliers($data);

    public function findSuppliers($id);

    public function updateSuppliers($data, $id);

    public function destroySuppliers($id);
}
