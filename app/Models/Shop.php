<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'cover_image',
        'owner_name',
        'name',
        'products',
        'orders',
        'status',
        'description',
        'account_holder_name',
        'account_holder_email',
        'bank_name',
        'account_number',
        'country',
        'city',
        'state',
        'address',
        'phone',
        'website'
    ];
}
