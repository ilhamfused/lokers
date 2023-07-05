@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Profile</h4>
                </div>
                <form action="/dashboard/profile/company/{{ $companyProfile->username }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="name" value="{{ old('name', $companyProfile->name) }}"
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
                                        value="{{ old('username', $companyProfile->username) }}" name="username">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="establishment_date">Establishment Date</label>
                                    <input type="date"
                                        class="form-control @error('establishment_date') is-invalid @enderror"
                                        id="establishment_date" placeholder="Establishment Date"
                                        value="{{ old('establishment_date', $companyProfile->establishment_date) }}"
                                        name="establishment_date">
                                    @error('establishment_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        id="url" placeholder="URL" value="{{ old('url', $companyProfile->url) }}"
                                        name="url">
                                    @error('url')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image" class="form-label">Profile Image</label>
                                    <input type="hidden" value="{{ $companyProfile->image }}" name="oldImage">
                                    @if ($companyProfile->image)
                                        <img src="{{ asset('storage/' . $companyProfile->image) }}"
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
                                    <label for="description" class="form-label">Description</label>
                                    @error('description')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <input id="description" type="hidden" name="description"
                                        value="{{ old('description', $companyProfile->description) }}">
                                    <trix-editor input="description"></trix-editor>
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
