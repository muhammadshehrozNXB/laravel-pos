<?php

namespace App\Repositories\Suppliers;

use App\Repositories\Suppliers\SuppliersRepositoryInterface;
use App\Models\Suppliers\SuppliersModel;

class SuppliersRepository implements SuppliersRepositoryInterface
{

    public function allSuppliers()
    {
        return SuppliersModel::all();
    }

    public function storeSuppliers($data)
    {
        return SuppliersModel::create($data);
    }

    public function findSuppliers($id)
    {
        return SuppliersModel::find($id);
    }

    public function updateSuppliers($data, $id)
    {
        $supplier = SuppliersModel::find($id);
        $supplier->name = $data['name'];
        $supplier->address = $data['address'];
        $supplier->email = $data['email'];
        $supplier->phone = $data['phone'];
        $supplier->save();
    }

    public function destroySuppliers($id)
    {
        $supplier = SuppliersModel::find($id);
        $supplier->delete();
        return redirect()->back();
    }
}
