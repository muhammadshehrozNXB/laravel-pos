<?php

namespace App\Repositories\Customers;

Interface CustomersRepositoryInterface
{

    public function allCustomers();

    public function storeCustomers($data);

    public function findCustomers($id);

    public function updateCustomers($data, $id);

    public function destroyCustomers($id);
}
