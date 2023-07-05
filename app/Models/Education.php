<?php

namespace App\Models;

use App\Models\JobPost;
use App\Models\JobseekerProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'educations';

    public function jobPost()
    {
        return $this->hasMany(JobPost::class);
    }

    public function jobseekerProfile()
    {
        return $this->hasMany(JobseekerProfile::class);
    }
}
