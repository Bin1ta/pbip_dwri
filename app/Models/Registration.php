<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'user_id',
        'remarks'
    ];

    public function docs(): HasMany
    {
        return $this->hasMany(RegistrationDoc::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

}
