@extends('front.layouts.main')

@section('container')
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <form action="/jobs">
                @if (request('jobtype'))
                    <input type="hidden" name="jobtype" value="{{ request('jobtype') }}">
                @endif
                @if (request('company'))
                    <input type="hidden" name="company" value="{{ request('company') }}">
                @endif
                <div class="input-group mb-3">
                    <span class="input-group-text bg-light" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search Jobs" aria-label="Recipient's username"
                        aria-describedby="button-addon2" value="{{ request('search') }}" name="search">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
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
    <div class="d-flex justify-content-center align-items-center">
        {{ $jobs->links() }}
    </div>
@endsection
