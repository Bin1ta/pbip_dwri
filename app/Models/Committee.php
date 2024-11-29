<?php

namespace App\Models;

use App\Enums\ProjectTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Committee extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'committee_category_id',
        'name',
        'name_en',
        'place',
    ];
    protected $casts = [
        'place' => ProjectTypeEnum::class,
    ];
    public function committeeCategory(): BelongsTo
    {
        return $this->belongsTo(CommitteeCategory::class);
    }
}
