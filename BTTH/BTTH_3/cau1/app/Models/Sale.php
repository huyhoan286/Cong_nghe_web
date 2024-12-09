<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'sale_id';
    protected $fillable = ['medicine_id', 'quantity', 'sale_date', 'customer_phone'];
}
