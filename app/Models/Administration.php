<?php

namespace App\Models;

use App\Enums\DocumentTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administration extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'title',
        'date',
        'photo',
        'user_id',
        'remarks',
        'type'
    ];


    protected $casts = [
        'type' => DocumentTypeEnum::class
        ];

    public function docs(): HasMany
    {
        return $this->hasMany(AdministrationDoc::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

}
