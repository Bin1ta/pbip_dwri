<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'user_id',
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
    public function docs(): HasMany
    {
        return $this->hasMany(InvoiceDoc::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
