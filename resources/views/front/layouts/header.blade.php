<div class="header-top">
    <div class="container">
        <div class="logo">
            <a href="/"><img src="\assets\images\lokers\lokers-full-3.svg" alt="logo"></a>
            {{-- <img src="\assets\images\lokers\lokers-full-3.svg" alt="logo"> --}}
        </div>

        <div class="header-top-right">
            @auth
                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown"
                        class="user-dropdown d-flex align-items-center dropend dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="avatar avatar-md2">
                            @if (auth()->user()->isJobseeker())
                                @if (auth()->user()->jobseekerProfile->image)
                                    <img src="{{ asset('storage/' . auth()->user()->jobseekerProfile->image) }}">
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
                        <div class="text">
                            {{-- @dd(auth()->user()->jobseekerProfile->name) --}}
                            <h6 class="user-dropdown-name">
                                @if (auth()->user()->isJobseeker())
                                    {{ auth()->user()->jobseekerProfile->name }}
                                @elseif(auth()->user()->isCompany())
                                    {{ auth()->user()->companyProfile->name }}
                                @endif
                            </h6>
                            <p class="user-dropdown-status text-sm text-muted">
                                {{ auth()->user()->role->name }}
                            </p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-grid"></i> Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="login">
                    <a href="/login"><i class="icon-mid bi bi-box-arrow-right me-2"></i> Login</a>
                </div>
            @endauth



            <!-- Burger button responsive -->
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </div>
    </div>
</div>
