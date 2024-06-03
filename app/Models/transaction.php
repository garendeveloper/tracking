<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'customer', 'driver', 'weigher', 'gross', 'plate_number', 'weigh_in'
    ];
}
