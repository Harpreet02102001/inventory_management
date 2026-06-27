<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockHistory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'user_id',
        'type',
        'old_quantity',
        'quantity_changed',
        'new_quantity',
        'remarks',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWhereType($query, $type = null)
    {
        if (!$type) {
            return $query;
        }
        $query->where('type', $type);
        return $query;
    }

    public function scopewhereProductKeywords($query, $search = null)
    {
        if (!$search) {
            return $query;  
        }
        $query->whereHas('product', function ($q) use ($search) {

            $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('sku', 'like', '%' . $search . '%');
        });
        return $query;
    }
}
