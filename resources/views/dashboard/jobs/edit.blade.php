@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Job</h4>
                </div>
                <form action="/dashboard/jobs/{{ $job->slug }}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" placeholder="Title" value="{{ old('title', $job->title) }}"
                                        name="title" autofocus required>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="job_location">Job Location</label>
                                    <input type="text" class="form-control @error('job_location') is-invalid @enderror"
                                        id="job_location" placeholder="Job Location"
                                        value="{{ old('job_location', $job->job_location) }}" name="job_location">
                                    @error('job_location')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="job_type_id" class="form-label">Job Type</label>
                                    <select class="choices form-select" name="job_type_id">
                                        @foreach ($jobTypes as $jobType)
                                            @if (old('job_type_id', $job->job_type_id) == $jobType->id)
                                                <option value="{{ $jobType->id }}" selected>{{ $jobType->name }}</option>
                                            @else
                                                <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="education">Education</label>
                                    <select class="choices form-select" id="education" name="education_id">
                                        @foreach ($educations as $education)
                                            @if (old('education_id', $job->education_id) == $education->id)
                                                <option value="{{ $education->id }}" selected>{{ $education->name }}
                                                </option>
                                            @else
                                                <option value="{{ $education->id }}">{{ $education->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Active</label>
                                    <select class="choices form-select" id="is_active" name="is_active">
                                        <option value="1"
                                            {{ old('is_active', $job->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0"
                                            {{ old('is_active', $job->is_active) == 0 ? 'selected' : '' }}>Not Active
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="job_description" class="form-label">Job Description</label>
                                    @error('job_description')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <input id="job_description" type="hidden" name="job_description"
                                        value="{{ old('job_description', $job->job_description) }}">
                                    <trix-editor input="job_description"></trix-editor>
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
