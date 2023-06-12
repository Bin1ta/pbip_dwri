<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForestDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'forest_category_id',
        'forest_name',
        'forest_name_en',
        'address',
        'address_en',
        'house_hold',
        'area',
        'approve_date',
        'end_date',
        'sub_division_id',
        'remarks',
        'remarks_en',
    ];
}
