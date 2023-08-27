<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellandpurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'adv_type',
        'company_name',
        'number_of_shares',
        'cost_per_share',
        'name',
        'email',
        'mobile',
        'description',
        'stock_code'
    ];

}
