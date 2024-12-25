<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    protected $fillable = [
        'title',
        'description',
        'experience',
        'salary',
        'location',
        'extra_info',
        'company_name',
        'company_logo',
    ];

    public function getExtraInfoAttribute($value)
    {
        return explode(',', $value);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
