<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable=[
        'invoice_no',
        'date',
        'letter_count',
        'rec_name',
        'subject',
        'deliver_type',
        'photo',
        'remarks'
    ];

    public function getPhotoAttribute($value): string
    {
        return asset('storage/' . $value);
    }

    public function setPhotoAttribute($value)
    {
        $this->attributes['photo'] = $value->store('invoice', 'public');
    }
}
