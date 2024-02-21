<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'firstName',
        'lastName',
        'preferredName',
        'postcode',
        'address1',
        'address2',
        'town',
        'phone',
        'user_id',
    ];
}
