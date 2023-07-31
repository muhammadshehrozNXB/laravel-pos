<?php

namespace App\Repositories\PurchaseOrder;

Interface PurchaseOrderRepositoryInterface
{

    public function allPurchaseOrder();

    public function storePurchaseOrder($data);

    public function findPurchaseOrder($id);

    public function updatePurchaseOrder($data, $id);

    public function destroyPurchaseOrder($id);
}
