<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\JobseekerProfile;
use Illuminate\Support\Facades\Storage;

class JobseekerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.jobseeker.index', [
            'user' => auth()->user(),
            'age' => Carbon::parse(auth()->user()->jobseekerProfile->date_of_birth)->age,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobseekerProfile  $jobseekerProfile
     * @return \Illuminate\Http\Response
     */
    public function show(JobseekerProfile $jobseekerProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobseekerProfile  $jobseekerProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(JobseekerProfile $jobseekerProfile)
    {
        // ddd($jobseekerProfile);
        if ($jobseekerProfile->user_id !== auth()->user()->id)
            abort(403);

        return view('dashboard.profile.jobseeker.edit', [
            'jobseekerProfile' => $jobseekerProfile,
            'educations' => Education::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobseekerProfile  $jobseekerProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobseekerProfile $jobseekerProfile)
    {
        $rules = [
            'name' => 'required|max:255',
            'date_of_birth' => 'required',
            'location' => 'required',
            'skill_set' => 'required',
            'education_id' => 'required',
            'major' => '',
            'image' => 'image|file|max:5000',
            'ijazah' => 'mimes:pdf|max:10000',
            'about' => 'required',
            // 'image' => 'image|file|max:5000',
        ];

        if ($request->username != $jobseekerProfile->username)
            $rules['username'] = 'required|max:30|unique:jobseeker_profiles';

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('jobseeker-images');
        }

        if ($request->file('ijazah')) {
            if ($request->oldIjazah) {
                Storage::delete($request->oldIjazah);
            }
            $validatedData['ijazah'] = $request->file('ijazah')->store('jobseeker-ijazah');
        }

        JobseekerProfile::where('id', $jobseekerProfile->id)->update($validatedData);

        return redirect('/dashboard/profile/jobseeker')->with('success', 'Profile Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobseekerProfile  $jobseekerProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobseekerProfile $jobseekerProfile)
    {
        //
    }
}
