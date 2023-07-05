<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\JobseekerProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{

    public function applied()
    {
        $user = Auth::user();
        return view('dashboard.apply.applied', [
            'jobs' => JobPost::whereHas('applicant', fn ($query) => $query->where('jobseeker_profile_id', $user->jobseekerProfile->id))->get(),
        ]);
    }

    public function applicants()
    {
        $allJob = DB::table('job_posts')->select('id')->where('user_id', auth()->user()->id);
        return view('dashboard.apply.applicants', [
            'jobs' => JobPost::whereHas('applicant', fn ($query) => $query->whereIn('job_post_id', $allJob))->get(),
        ]);
    }

    public function applicantLists(JobPost $job)
    {
        return view('dashboard.apply.applicant-lists', [
            'applicants' => JobseekerProfile::whereHas('applicant', fn ($query) => $query->where('job_post_id', $job->id))->get(),
            'jobTitle' => $job->title,
        ]);
    }

    public function applicantProfile(JobseekerProfile $jobseeker)
    {
        return view('dashboard.apply.applicant-profile', [
            'jobseeker' => $jobseeker,
            'age' => Carbon::parse($jobseeker->date_of_birth)->age,
        ]);
    }
}
