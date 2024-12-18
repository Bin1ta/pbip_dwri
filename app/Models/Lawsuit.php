<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lawsuit extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'type',
        'type_en',
        'bigo',
        'bigo_en',
        'fine',
        'jailed',
        'reg_date',
        'reg_body',
        'accused',
        'remarks',
        'remarks_en',
    ];
}
