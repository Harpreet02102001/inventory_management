<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Supplier extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;


    protected $table = 'suppliers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'address',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
