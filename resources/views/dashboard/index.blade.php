@extends('dashboard.layouts.main')

@section('container')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Hello,
                            @if (auth()->user()->isJobseeker())
                                {{ auth()->user()->jobseekerProfile->name }}
                            @elseif(auth()->user()->isCompany())
                                {{ auth()->user()->companyProfile->name }}
                            @endif
                        </h3>
                        {{-- <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p> --}}
                    </div>
                </div>
            </div>
            {{-- <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Example Content</h4>
                    </div>
                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur quas omnis
                        laudantium tempore
                        exercitationem, expedita aspernatur sed officia asperiores unde tempora maxime odio
                        reprehenderit
                        distinctio incidunt! Vel aspernatur dicta consequatur!
                    </div>
                </div>
            </section> --}}
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Mazer</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                        by <a href="https://ahmadsaugi.com">Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
@endsection
