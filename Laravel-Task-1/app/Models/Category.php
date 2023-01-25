<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public static $rules = ['name' => 'required', 'image' => 'required'];
    protected $guarded = [];
    public $timestamps = false;
}
