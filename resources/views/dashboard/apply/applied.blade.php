@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Job Applied
                    </h3>
                </div>
            </div>
        </div>
        @foreach ($jobs as $job)
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="h3 mb-1"><a href="/job/{{ $job->slug }}"
                                            class="text-decoration-none">{{ $job->title }}</a></h3>
                                    <small class="text-muted d-block mb-2">{{ $job->created_at->diffForHumans() }}</small>
                                </div>
                                <h6 class="text-success h6 mb-1">{{ $job->user->companyProfile->name }}</h6>
                                <div class="grid gap-2 mb-1">
                                    <a href="/jobs?education={{ $job->education->slug }}" class="text-decoration-none"><span
                                            class="badge bg-primary text-uppercase">{{ $job->education->name }}</span></a>
                                    <a href="/jobs?jobtype={{ $job->jobType->slug }}" class="text-decoration-none"><span
                                            class="badge bg-light-primary">{{ $job->jobType->name }}</span></a>
                                </div>
                                <h6 class="h6 mb-2">{{ $job->job_location }}</h6>
                                <p class="card-text">
                                    {{ $job->excerpt }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
