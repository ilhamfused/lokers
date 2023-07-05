@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Profile</h4>
                </div>
                <form action="/dashboard/profile/jobseeker/{{ $jobseekerProfile->username }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="name" value="{{ old('name', $jobseekerProfile->name) }}"
                                        name="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="username">username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" placeholder="username"
                                        value="{{ old('username', $jobseekerProfile->username) }}" name="username">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                        id="date_of_birth" placeholder="Date of Birth"
                                        value="{{ old('date_of_birth', $jobseekerProfile->date_of_birth) }}"
                                        name="date_of_birth">
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        id="location" placeholder="Location"
                                        value="{{ old('location', $jobseekerProfile->location) }}" name="location">
                                    @error('location')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image" class="form-label">Profile Image</label>
                                    <input type="hidden" value="{{ $jobseekerProfile->image }}" name="oldImage">
                                    @if ($jobseekerProfile->image)
                                        <img src="{{ asset('storage/' . $jobseekerProfile->image) }}"
                                            class="img-preview img-fluid mb-3 col-md-5 d-block">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-md-5">
                                    @endif
                                    <input class="form-control  @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image" accept="image/*" onchange="showImagePreview()">
                                    @error('image')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skill">Skill</label>
                                    <input type="text" class="form-control @error('skill_set') is-invalid @enderror"
                                        id="skill" placeholder="skill"
                                        value="{{ old('skill_set', $jobseekerProfile->skill_set) }}" name="skill_set">
                                    @error('skill_set')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="education">Education</label>
                                    <select class="choices form-select" id="education" name="education_id">
                                        @foreach ($educations as $education)
                                            @if (old('education_id', $jobseekerProfile->education_id) == $education->id)
                                                <option value="{{ $education->id }}" selected>{{ $education->name }}
                                                </option>
                                            @else
                                                <option value="{{ $education->id }}">{{ $education->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="major">Major</label>
                                    <input type="text" class="form-control @error('major') is-invalid @enderror "
                                        id="major" placeholder="Major"
                                        value="{{ old('major', $jobseekerProfile->major) }}" name="major"
                                        @if ($jobseekerProfile->education_id < 3) disabled @endif>
                                    @error('major')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    <label for="ijazah" class="form-label">Ijazah</label>
                                    <input type="hidden" value="{{ $jobseekerProfile->ijazah }}" name="oldIjazah">
                                    <input class="form-control  @error('ijazah') is-invalid @enderror" type="file"
                                        id="ijazah" name="ijazah" accept="application/pdf">
                                </div>

                                <div class="form-group">
                                    <label for="about" class="form-label">About</label>
                                    @error('about')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <input id="about" type="hidden" name="about"
                                        value="{{ old('about', $jobseekerProfile->about) }}">
                                    <trix-editor input="about"></trix-editor>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
