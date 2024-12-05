<?php

namespace App\Models;

use App\Enums\MonthEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkPlanProgress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'year',
        'month',
        'detail',
        'quantity',
        'first_quarterly_1',
        'first_quarterly_2',
        'first_quarterly_3',
        'first_quarterly_4',
        'second_quarterly_1',
        'second_quarterly_2',
        'second_quarterly_3',
        'second_quarterly_4',
        'third_quarterly_1',
        'third_quarterly_2',
        'third_quarterly_3',
        'third_quarterly_4',
        'monthly_progress',
        'upto_month_progress',
        'completed_word',
        'less_progress_reason',
    ];

    protected $casts = [
      'month' => MonthEnum::class
    ];
}
