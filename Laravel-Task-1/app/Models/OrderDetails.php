<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    public static $rules = [
        'products' => 'required',
        'order_id' => 'required',
    ];
    protected $guarded = [];
}
