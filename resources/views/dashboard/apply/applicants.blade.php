@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Job That Have Applicants
                    </h3>
                </div>
            </div>
        </div>
        @foreach ($jobs as $job)
            <div class="row">
                <div class="col">
                    <div class="card">
                        @if (!$job->is_active)
                            <div class="position-absolute top-0 start-0 py-2 px-3 text-white"
                                style="background-color: rgba(241, 19, 19, 0.543)">
                                Inactive</div>
                        @endif
                        <div class="card-content">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="h3 mb-1"><a href="/dashboard/applicants/{{ $job->slug }}"
                                            class="text-decoration-none">{{ $job->title }}</a></h3>
                                    <small class="text-muted d-block mb-2">{{ $job->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="grid gap-2 mb-1">
                                    <span class="badge bg-primary text-uppercase">{{ $job->education->name }}</span>
                                    <span class="badge bg-light-primary">{{ $job->jobType->name }}</span>
                                </div>
                                <h6 class="h6 mb-2">{{ $job->job_location }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
