<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">
                                    @if (auth()->user()->isJobseeker())
                                        {{ auth()->user()->jobseekerProfile->name }}
                                    @elseif(auth()->user()->isCompany())
                                        {{ auth()->user()->companyProfile->name }}
                                    @endif
                                </h6>
                                <p class="mb-0 text-sm text-gray-600">{{ auth()->user()->role->name }}</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    @if (auth()->user()->isJobseeker())
                                        @if (auth()->user()->jobseekerProfile->image)
                                            <img
                                                src="{{ asset('storage/' . auth()->user()->jobseekerProfile->image) }}">
                                        @else
                                            <img src="{{ asset('storage\placeholder\placeholder-jobseeker.jpg') }}">
                                        @endif
                                    @elseif(auth()->user()->isCompany())
                                        @if (auth()->user()->companyProfile->image)
                                            <img src="{{ asset('storage/' . auth()->user()->companyProfile->image) }}">
                                        @else
                                            <img src="{{ asset('storage\placeholder\placeholder-company.svg') }}">
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li><a class="dropdown-item" href="/dashboard/profile/{{ auth()->user()->role->name }}"><i
                                    class="icon-mid bi bi-person me-2"></i> My
                                Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i
                                        class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
