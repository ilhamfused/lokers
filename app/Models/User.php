<?php

namespace App\Models;

use App\Models\Role;
use App\Models\JobPost;
use App\Models\CompanyProfile;
use App\Models\JobseekerProfile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companyProfile()
    {
        return $this->hasOne(CompanyProfile::class);
    }

    public function jobPost()
    {
        return $this->hasMany(JobPost::class);
    }

    public function jobseekerProfile()
    {
        return $this->hasOne(JobseekerProfile::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isJobseeker()
    {
        return $this->role->name == 'jobseeker';
    }

    public function isCompany()
    {
        return $this->role->name == 'company';
    }
}
