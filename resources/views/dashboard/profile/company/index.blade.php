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
                                <a href="/dashboard/profile/company/{{ $user->companyProfile->username }}/edit"
                                    class="btn btn-primary">Edit Profile</a>
                            </div>
                            <div class="info d-flex justify-content-between">
                                <div class="name-since">
                                    <h2 class="h2 mb-3">{{ $user->companyProfile->name }}</h2>
                                    <p class="fs-5 mb-0">Since {{ $user->companyProfile->establishment_date }}</p>
                                </div>
                                <div class="avatar avatar-xl">
                                    @if ($user->companyProfile->image)
                                        <img src="{{ asset('storage/' . $user->companyProfile->image) }}">
                                    @else
                                        <img src="{{ asset('storage\placeholder\placeholder-company.svg') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="divider divider-left">
                            <div class="h5 divider-text">Description</div>
                        </div>
                        <div class="card-body">
                            {!! $user->companyProfile->description !!}
                        </div>
                        <div class="divider divider-left">
                            <div class="h5 divider-text">Website</div>
                        </div>
                        <div class="card-body">
                            {{ $user->companyProfile->url }}
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
