<?php

namespace App\Models\ProductsType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsTypeModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tbl_products_type';
    protected $fillable = ['title'];
}
