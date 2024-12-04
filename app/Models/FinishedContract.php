<?php

namespace App\Models;

use App\Enums\ProjectTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinishedContract extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'place',
        'work',
        'identification_no',
        'contractor_detail',
        'agreement_date',
        'agreement_amount',
        'completion_date',
        'actual_expenditure',
        'contractors_liability_status',
        'current_status',
        'work_completed',
    ];
    protected $casts = [
        'place' => ProjectTypeEnum::class,
    ];

}
