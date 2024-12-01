<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractProgress extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates=[
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable=[
        'work_name',
        'contract_id',
        'contractor_name',
        'contractor_amount',
        'agreement_date',
        'completion_date',
        'completion_date_due',
        'times_extended',
        'time_extended_reserved',
        'financial_progress_amount',
        'financial_progress_percent',
        'financial_progress_date',
        'physical_progress_percent',
        'physical_progress_date',
        'remarks',
        'progress_status',

    ];
}
