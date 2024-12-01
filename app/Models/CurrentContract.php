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
        'place_id',
        'work',
        'identification_no',
        'contractor_detail',
        'agreement_date',
        'completion_date',
        'agreement_amount',
        'extension_time',
        'extension_duration',
        'completion_date_revised',
        'current_status',
        'updated_progress',
        'authorised_person',

    ];
}
