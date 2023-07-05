<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\JobType;
use App\Models\Education;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jobs.index', [
            'jobs' => JobPost::where('user_id', auth()->user()->id)->get(),
            // 'jobactives' => JobPost::where('user_id', auth()->user()->id)->where('is_active', true)->get(),
            // 'jobinactives' => JobPost::where('user_id', auth()->user()->id)->where('is_active', false)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jobs.create', [
            'jobTypes' => JobType::all(),
            'educations' => Education::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'job_location' => 'required|max:255',
            'job_type_id' => 'required',
            'education_id' => 'required',
            'job_description' => 'required',
            // 'image' => 'image|file|max:5000',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['slug'] = SlugService::createSlug(JobPost::class, 'slug', $request->title);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->job_description), 200, '...');
        $validatedData['user_id'] = auth()->user()->id;

        JobPost::create($validatedData);

        return redirect('/dashboard/jobs')->with('success', 'New Job Has Been Posted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function show(JobPost $jobPost)
    {
        if ($jobPost->user->id !== auth()->user()->id)
            abort(403);

        return view('dashboard.jobs.show', [
            'job' => $jobPost,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPost $jobPost)
    {
        if ($jobPost->user_id !== auth()->user()->id)
            abort(403);

        return view('dashboard.jobs.edit', [
            'job' => $jobPost,
            'jobTypes' => JobType::all(),
            'educations' => Education::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPost $jobPost)
    {
        $rules = [
            'title' => 'required|max:255',
            'job_location' => 'required|max:255',
            'job_type_id' => 'required',
            'education_id' => 'required',
            'job_description' => 'required',
            'is_active' => 'required',
            // 'image' => 'image|file|max:5000',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['slug'] = SlugService::createSlug(JobPost::class, 'slug', $request->title);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->job_description), 200, '...');
        $validatedData['user_id'] = auth()->user()->id;

        JobPost::where('id', $jobPost->id)->update($validatedData);

        return redirect('/dashboard/jobs')->with('success', 'Job Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPost $jobPost)
    {
        JobPost::destroy($jobPost->id);
        return redirect('/dashboard/jobs')->with('success', 'Job Post Has Been Deleted!');
    }
}
