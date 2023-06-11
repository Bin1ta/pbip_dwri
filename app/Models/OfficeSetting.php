<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'office_name',
        'office_name_en',
        'office_phone',
        'office_email',
        'cover_photo',
        'office_address',
        'office_address_en',
        'en_header',
        'ne_header',
        'chief_id',
        'information_officer_id',
        'grievance_officer_id',
        'map_iframe',
        'facebook_iframe',
        'twitter_iframe',
        'document_list_type'
    ];

    public function setCoverPhotoAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['cover_photo'] = $value->store('office_setting', 'public');
        }
    }

    public function setEnHeaderAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['en_header'] = $value->store('office_setting', 'public');
        }
    }

    public function setNeHeaderAttribute($value)
    {
        if (!empty($value) && !is_string($value)) {
            $this->attributes['ne_header'] = $value->store('office_setting', 'public');
        }
    }

    public function chief(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'chief_id');
    }

    public function informationOfficer(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'information_officer_id');
    }

    public function grievanceOfficer(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'grievance_officer_id');
    }

    public function officeSettingHeaders()
    {
        return $this->hasMany(OfficeSettingHeader::class);
    }
}
