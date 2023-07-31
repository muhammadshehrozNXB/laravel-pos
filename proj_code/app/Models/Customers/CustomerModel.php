<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'customers';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'avatar'];
}
