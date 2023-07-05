@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Applicants on {{ $jobTitle }}
                    </h3>
                </div>
            </div>
        </div>
        @foreach ($applicants as $applicant)
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="h3 mb-1"><a href="/dashboard/applicants/profile/{{ $applicant->username }}"
                                            class="text-decoration-none">{{ $applicant->name }}</a></h3>
                                </div>
                                <div class="grid gap-2 mb-1">
                                    @if ($applicant->education_id)
                                        <span
                                            class="badge bg-primary text-uppercase">{{ $applicant->education->name }}</span>
                                    @endif
                                </div>
                                <h6 class="h6 mb-2">{{ $applicant->location }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
