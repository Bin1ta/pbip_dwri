<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'reg_no',
        'date',
        'letter_count',
        'invoice_no',
        'rec_date',
        'sender_name',
        'address',
        'subject',
        'department',
        'photo',
        'remarks'
    ];

    public function getPhotoAttribute($value): string
    {
        return asset('storage/' . $value);
    }

    public function setPhotoAttribute($value)
    {
        $this->attributes['photo'] = $value->store('registration', 'public');
    }

}
