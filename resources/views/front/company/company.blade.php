@extends('front.layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <h1 class="h1 mb-1 text-center">{{ $company->name }}</h1>
                <h6 class="h6 mb-5 text-center">Since {{ $company->establishment_date }}</h6>
                <div class="divider">
                    <div class="h5 divider-text text-primary">Website</div>
                </div>
                <strong><a href="{{ $company->url }}" class="text-decoration-none" target="_blank">Company Website</a></strong>
                <div class="divider">
                    <div class="h5 divider-text text-primary">Company Profile</div>
                </div>
                <article class="fs-6">
                    {!! $company->description !!}
                </article>
            </div>
        </div>
    </div>
@endsection
