<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommitteeMember extends Model
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
        'address',
        'address_en',
        'phone',
        'photo',
        'post',
        'post_en',
        'committee_id',
        'remarks'
    ];

    public function committee(): BelongsTo
    {
        return $this->belongsTo(Committee::class);
    }
    public function getPhotoAttribute($value): string
    {
        return $this->attributes['photo'] ? asset('storage/' . $this->attributes['photo']) : asset('assets/backend/images/user_icon.jpg');
    }

    public function setPhotoAttribute($value)
    {
        $this->attributes['photo'] = $value->store('committee_member', 'public');
    }

}
