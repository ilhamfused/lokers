@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="info d-flex justify-content-between">
                                <div class="name-since">
                                    <h2 class="h2 mb-3">{{ $jobseeker->name }}</h2>
                                    <p class="fs-5 mb-0">{{ $age }} Years Old</p>
                                    <p class="fs-5 mb-0">{{ $jobseeker->location }}</p>
                                </div>
                                <div class="avatar avatar-xl">
                                    @if ($jobseeker->image)
                                        <img src="{{ asset('storage/' . $jobseeker->image) }}">
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
                            {!! $jobseeker->about !!}
                        </div>
                        <div class="divider divider-left">
                            <div class="h5 divider-text">Skill</div>
                        </div>
                        <div class="card-body">
                            {{ $jobseeker->skill_set }}
                        </div>
                        <div class="divider divider-left">
                            <div class="h5 divider-text">Education</div>
                        </div>
                        <div class="card-body">
                            @if ($jobseeker->education_id)
                                <p>
                                    @if ($jobseeker->education_id)
                                        {{ Str::upper($jobseeker->education->name) }}
                                    @endif
                                    @if ($jobseeker->major)
                                        - {{ Str::headline($jobseeker->major) }}
                                    @endif
                                </p>
                            @endif

                            @if ($jobseeker->ijazah)
                                <a class="h6" href={{ asset('storage/' . $jobseeker->ijazah) }}>Download
                                    Ijazah</a>
                            @endif
                        </div>
                        <div class="divider divider-left">
                            <div class="h5 divider-text">Contact</div>
                        </div>
                        <div class="card-body">
                            {{ $jobseeker->user->email }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
