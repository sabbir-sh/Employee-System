<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Navbar Brand (Optional) -->
        {{-- <a class="navbar-brand" href="{{route('adminDashboard')}}">{{ $page_title ?? "Dashboard" }}</a> --}}

        <!-- Navbar Toggle Button for Small Screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Show User's Name -->
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                           {{ Auth::user()->name }}
                        </a>
                    </li>
                @endif

                <!-- Profile Link -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>

                <!-- Search Form with Search Icon -->
                <li class="nav-item d-flex align-items-center">
                    {{-- <form class="d-flex" action="{{ route('search') }}" method="GET"> --}}
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fa fa-search"></i> <!-- Font Awesome Search Icon -->
                        </button>
                    </form>
                </li>

                <!-- Logout Link (Optional) -->
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('logOut') }}">Logout</a> --}}
                </li>
            </ul>
        </div>
    </div>
</nav>
