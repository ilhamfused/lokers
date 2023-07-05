<?php

namespace App\Models;

use App\Models\Major;
use App\Models\Education;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobseekerProfile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['user', 'education'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function jobPost()
    {
        return $this->belongsToMany(Applicant::class, 'applicants', 'jobseeker_profile_id', 'job_post_id');
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
