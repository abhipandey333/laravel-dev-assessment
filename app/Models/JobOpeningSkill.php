<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOpeningSkill extends Model
{
    protected $fillable = ['job_opening_id', 'skill_id'];

    public function jobOpenings()
    {
        return $this->belongsToMany(JobOpening::class);
    }

}
