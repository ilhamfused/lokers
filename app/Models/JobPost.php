<?php

namespace App\Models;

use App\Models\User;
use App\Models\Education;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class JobPost extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['jobType', 'user', 'education'];

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function jobseekerProfile()
    {
        return $this->belongsToMany(Applicant::class, 'applicants', 'job_post_id', 'jobseeker_profile_id');
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('job_description', 'like', '%' . $search . '%'));

        $query->when($filters['education'] ?? false, fn ($query, $education) =>
        $query->whereHas('education', fn ($query) =>
        $query->where('slug', $education)));

        $query->when($filters['jobtype'] ?? false, fn ($query, $jobtype) =>
        $query->whereHas('jobtype', fn ($query) =>
        $query->where('slug', $jobtype)));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
