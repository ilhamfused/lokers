@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-light-success alert-dismissible show fade">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div id="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="navigation mb-3">
                                <a href="/dashboard/profile/jobseeker/{{ $user->jobseekerProfile->username }}/edit"
                                    class="btn btn-primary">Edit Profile</a>
                            </div>
                            <div class="info d-flex justify-content-between">
                                <div class="name-since">
                                    <h2 class="h2 mb-3">{{ $user->jobseekerProfile->name }}</h2>
                                    <p class="fs-5 mb-0">{{ $age }} Years Old</p>
                                    <p class="fs-5 mb-0">{{ $user->jobseekerProfile->location }}</p>
                                </div>
                                <div class="avatar avatar-xl">
                                    @if ($user->jobseekerProfile->image)
                                        <img src="{{ asset('storage/' . $user->jobseekerProfile->image) }}">
                                    @else
                                        <img src="{{ asset('storage\placeholder\placeholder-jobseeker.jpg') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="divider divider-left">
                            <div class="h5 divider-text">About</div>
                        </div>
                        <div class="card-body">
                            {!! $user->jobseekerProfile->about !!}
                        </div>
                        <div class="divider divider-left">
                            <div class="h5 divider-text">Skill</div>
                        </div>
                        <div class="card-body">
                            {{ $user->jobseekerProfile->skill_set }}
                        </div>
                        <div class="divider divider-left">
                            <div class="h5 divider-text">Education</div>
                        </div>
                        <div class="card-body">
                            <p>
                                @if ($user->jobseekerProfile->education_id)
                                    {{ Str::upper($user->jobseekerProfile->education->name) }}
                                @endif
                                @if ($user->jobseekerProfile->major)
                                    - {{ Str::headline($user->jobseekerProfile->major) }}
                                @endif
                            </p>


                            @if ($user->jobseekerProfile->ijazah)
                                <a class="h6" href={{ asset('storage/' . $user->jobseekerProfile->ijazah) }}>Download
                                    Ijazah</a>
                            @endif
                        </div>
                        <div class="divider divider-left">
                            <div class="h5 divider-text">Contact</div>
                        </div>
                        <div class="card-body">
                            {{ $user->email }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
