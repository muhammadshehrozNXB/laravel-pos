<?php

namespace App\Models\PurchaseOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tbl_purchase_order';
    protected $fillable = ['product_id','supplier_id','price','quantity'];
}
