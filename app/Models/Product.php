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
        'stock_quantity',
        'image_url',
        'status',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function stockHistories()
    {
        return $this->hasMany(StockHistory::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
