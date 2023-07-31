<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'tbl_products';
    protected $fillable = ['product_type_id', 'title'];
}
