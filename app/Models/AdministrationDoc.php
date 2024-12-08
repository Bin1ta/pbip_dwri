<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdministrationDoc extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates=[
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'administration_id',
        'doc'
    ];

    public function administration(): BelongsTo
    {
        return $this->belongsTo(Administration::class);
    }
}
