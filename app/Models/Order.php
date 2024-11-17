<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'city',
        'quantity',
        'condition',
        'barcode',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
