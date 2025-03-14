<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    
    protected $table = 'ticketforms';

    protected $fillable = ([
            'name',
            'email',
            't_type',
            'nationality',
            'date',
            'time',
            'quantity',
    ]);
}
