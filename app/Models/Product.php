<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;
    use SoftDeletes;
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'supplier_id',
        'price',
        'selling_price',
        'quantity',
        'image_url',
    ];
}
