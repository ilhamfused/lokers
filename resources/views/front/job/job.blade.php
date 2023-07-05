@extends('front.layouts.main')

@section('container')
    {{-- @dd(
        auth()->user()->jobseekerProfile->applicant->contains('job_post_id', $job->id)
    ) --}}

    <div class="row">
        <div class="col-md-8">
            <div class="card p-4">
                <h1 class="h1 mb-1">{{ $job->title }}</h1>
                <div class="grid gap-2 mb-1">
                    <span class="badge bg-primary text-uppercase">{{ $job->education->name }}</span>
                    <span class="badge bg-light-primary">{{ $job->jobType->name }}</span>
                </div>
                <h6 class="h6 mb-5">{{ $job->job_location }}</h6>
                <article class="fs-5">
                    {!! $job->job_description !!}
                </article>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card p-4">
                <div style="max-height: 200px">
                    @if ($job->user->companyProfile->image)
                        <img src="{{ asset('storage/' . $job->user->companyProfile->image) }}">
                    @else
                        <img src="{{ asset('storage\placeholder\placeholder-company.svg') }}">
                    @endif
                </div>
                <h3 class="h3 mb-1 text-decoration-none"><a href="/company/{{ $job->user->companyProfile->username }}"
                        class="text-decoration-none">{{ $job->user->companyProfile->name }}</a></h3>
                <h6 class="h6 mb-5">Since {{ $job->user->companyProfile->establishment_date }}</h6>
                @can('jobseeker')
                    @if ($user->isJobseeker())
                        @if ($user->jobseekerProfile->applicant->contains('job_post_id', $job->id))
                            <button type="button" class="btn btn-secondary rounded-pill disabled">Applied</button>
                        @else
                            <form action="/job/apply" method="post">
                                @csrf
                                <input type="hidden" value="{{ $job->id }}" name="job_post_id">
                                <input type="hidden" value="{{ $user->jobseekerProfile->id }}" name="jobseeker_profile_id">
                                <button type="submit" class="btn btn-primary rounded-pill">Apply</button>
                            </form>
                        @endif
                    @endif
                @else
                    <button type="button" class="btn btn-secondary rounded-pill disabled">Login as Jobseeker to Apply</button>
                @endcan


            </div>
        </div>
    </div>
@endsection
