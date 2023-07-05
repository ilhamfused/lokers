@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <a href="/dashboard/jobs/{{ $job->slug }}/edit" class="btn btn-warning">Edit Job</a>
                        <form action="/dashboard/jobs/{{ $job->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" id="deleteJobsButton">Delete
                                Job</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
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
        </div>

    </div>
@endsection
