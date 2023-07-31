<?php

namespace App\Models\Suppliers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuppliersModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tbl_suppliers';
    protected $fillable = ['name','address','phone','email'];
}
