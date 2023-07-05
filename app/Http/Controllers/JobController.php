<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JobController extends Controller
{
    public function index()
    {
        return view('front.job.index', [
            'jobs' => JobPost::latest()->filter(request(['search', 'education', 'jobtype']))->where('is_active', true)->paginate(10)->withQueryString(),
        ]);
    }

    public function show(JobPost $job)
    {
        $user = Auth::user();
        return view('front.job.job', [
            'job' => $job,
            'user' => $user,
        ]);
    }

    public function apply(Request $request)
    {

        Applicant::create([
            'job_post_id' => $request->job_post_id,
            'jobseeker_profile_id' => $request->jobseeker_profile_id
        ]);

        return Redirect::back();
    }
}
