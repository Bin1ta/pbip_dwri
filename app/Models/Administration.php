<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administration extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'title',
        'date',
        'photo',
        'remarks'
    ];


    public function getPhotoAttribute($value): string
    {
        return asset('storage/' . $value);
    }

    public function setPhotoAttribute($value)
    {
        $this->attributes['photo'] = $value->store('administration', 'public');
    }
}
