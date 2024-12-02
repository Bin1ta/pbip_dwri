<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TotalProgress extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'year',
        'periodicity',
        'financial_progress_periodic',
        'financial_progress_cumulative',
        'financial_progress_rs',
        'periodic_percentage',
        'yearly_percentage',
        'periodic_physical_progress',
        'periodic_physical_cumulative',
        'remarks',
    ];
}
