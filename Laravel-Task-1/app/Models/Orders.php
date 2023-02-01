<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public static $rules = [
    'firstName' => 'required',
    'lastName' => 'required',
    'email' => 'required',
    'mobileNum' => 'required',
    'address1' => 'required',
    'address2' => 'required',
    'country' => 'required',
    'city' => 'required',
    'state' => 'required',
    'zipCode' => 'required',
    ];
    protected $guarded = [];
}
