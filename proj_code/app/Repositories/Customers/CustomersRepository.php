<?php

namespace App\Repositories\Customers;

use App\Repositories\Customers\CustomersRepositoryInterface;
use App\Models\Customers\CustomerModel;

class CustomersRepository implements CustomersRepositoryInterface
{

    public function allCustomers()
    {
        return CustomerModel::all();
    }

    public function storeCustomers($data)
    {
        $data = [
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'email' => $data->email,
            'phone' => $data->phone,
            'address' => $data->address,
            'avatar' => movefile($data,'avatar'),
        ];

        return CustomerModel::create($data);
    }

    public function findCustomers($id)
    {
        return CustomerModel::find($id);
    }

    public function updateCustomers($data, $id)
    {
        $category = CustomerModel::find($id);
        $category->first_name = $data->first_name;
        $category->last_name = $data->last_name;
        $category->email = $data->email;
        $category->phone = $data->phone;
        $category->address = $data->address;
        $category->avatar = movefile($data,'avatar');
        $category->save();
    }

    public function destroyCustomers($id)
    {
        $customer = CustomerModel::findorFail($id);
        if (!empty($customer) && file_exists(public_path('avatar/' . $customer->avatar)) && isset($customer->avatar)) unlink(public_path('avatar/' . $customer->avatar));
        $customer->delete();
    }
}
