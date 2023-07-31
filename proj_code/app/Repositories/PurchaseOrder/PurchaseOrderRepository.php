<?php

namespace App\Repositories\PurchaseOrder;

use App\Repositories\PurchaseOrder\PurchaseOrderRepositoryInterface;
use App\Models\PurchaseOrder\PurchaseOrderModel;

class PurchaseOrderRepository implements PurchaseOrderRepositoryInterface
{

    public function allPurchaseOrder()
    {
        return PurchaseOrderModel::join('tbl_products', 'tbl_purchase_order.product_id', '=', 'tbl_products.id')
            ->join('tbl_suppliers', 'tbl_purchase_order.supplier_id', '=', 'tbl_suppliers.id')
            ->select('tbl_purchase_order.*', 'tbl_products.title as product_name', 'tbl_suppliers.name as supplier_name')
            ->get();
    }

    public function storePurchaseOrder($data)
    {
        return PurchaseOrderModel::create($data);
    }

    public function findPurchaseOrder($id)
    {
        return PurchaseOrderModel::find($id);
    }

    public function updatePurchaseOrder($data, $id)
    {
        $category = PurchaseOrderModel::find($id);
        $category->product_id = $data['product_id'];
        $category->supplier_id = $data['supplier_id'];
        $category->price = $data['price'];
        $category->quantity = $data['quantity'];
        $category->save();
    }

    public function destroyPurchaseOrder($id)
    {
        $category = PurchaseOrderModel::find($id);
        $category->delete();
    }
}
