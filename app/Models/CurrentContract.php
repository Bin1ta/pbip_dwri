<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrentContract extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'name_en',
        'place',
        'work',
        'work_en',
        'identification_no',
        'contractor_detail',
        'contractor_detail_en',
        'agreement_date',
        'agreement_amount',
        'completion_date',
        'extension_time',
        'extension_duration',
        'completion_date_revised',
        'updated_progress',
        'updated_progress_en',
        'authrized_person',
        'authrized_person_en',

    ];
}
