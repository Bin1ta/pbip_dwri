<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class Audio extends Model
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
        'file',
    ];

    public function setFileAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['file'] = $value->store('audio', 'public');
        }
    }

    public function getFileUrlAttribute()
    {
        return $this->attributes['file'] ? Storage::disk('public')->url($this->attributes['file']) : '';
    }
}
