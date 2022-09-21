<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Store;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'country',
        'city',
        'postcode',
        'address_1',
        'address_2',
        'phone',
        'email',
        'note',
        'status',
        'store_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('price', 'qty');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
