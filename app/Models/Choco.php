<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Choco extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'choco';
    
    protected $fillable = [
        'Sales Person',
        'Country',
        'Product',
        'Date',
        'Amount',
        'Boxes Shipped'
    ];
}
