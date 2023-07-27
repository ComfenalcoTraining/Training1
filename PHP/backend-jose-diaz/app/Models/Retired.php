<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retired extends Model
{
    use HasFactory;

    protected $fillable = [
        'money_balance',
        'user_id',
        'date_retired',
    ];

}
