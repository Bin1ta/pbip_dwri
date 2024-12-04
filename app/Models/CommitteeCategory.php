<?php

namespace App\Models;

use App\Enums\ProjectTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommitteeCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'title_en',
        'place'
    ];
    protected $casts = [
        'place' => ProjectTypeEnum::class,
    ];

    public function committees(): HasMany
    {
        return $this->hasMany(Committee::class);
    }
}
