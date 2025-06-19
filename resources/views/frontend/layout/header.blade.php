<!-- Header -->
<header id="mainHeader" class="text-white"
    style="background: transparent; position: fixed; top: 0; width: 100%; z-index: 1000; transition: background-color 0.3s, box-shadow 0.3s;">
    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a href="/" class="text-black text-decoration-none">
                <h1 class="h1 mb-0">E.COm</h1>
            </a>


            <!-- Desktop Navigation -->
            <nav class="d-none d-md-block">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-black" href="/" style="border-bottom: 2px solid transparent;"
                            onmouseover="this.style.borderBottom='2px solid white'"
                            onmouseout="this.style.borderBottom='2px solid transparent'">
                            <h1 class="h5 mb-0">Home</h1>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="/about-us" style="border-bottom: 2px solid transparent;"
                            onmouseover="this.style.borderBottom='2px solid white'"
                            onmouseout="this.style.borderBottom='2px solid transparent'">
                            <h1 class="h5 mb-0">About</h1>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#" style="border-bottom: 2px solid transparent;"
                            onmouseover="this.style.borderBottom='2px solid white'"
                            onmouseout="this.style.borderBottom='2px solid transparent'">
                            <h1 class="h5 mb-0">Services</h1>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#" style="border-bottom: 2px solid transparent;"
                            onmouseover="this.style.borderBottom='2px solid white'"
                            onmouseout="this.style.borderBottom='2px solid transparent'">
                            <h1 class="h5 mb-0">Contact</h1>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{ route('product.index') }}"
                            style="border-bottom: 2px solid transparent;"
                            onmouseover="this.style.borderBottom='2px solid white'"
                            onmouseout="this.style.borderBottom='2px solid transparent'">
                            <h1 class="h5 mb-0">Product</h1>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Mobile Navigation (Hamburger Button) -->
            <button class="d-md-none navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div class="collapse d-md-none" id="navbarNav">
        <nav>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-warning" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="{{ route('product.index') }}">Product</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('scroll', function () {
        const header = document.getElementById('mainHeader');
        if (window.scrollY > 50) {
            header.style.backgroundColor = '#ffffff'; // or any color like '#f8f9fa'
            header.style.boxShadow = '0 2px 6px rgba(0,0,0,0.1)';
        } else {
            header.style.backgroundColor = 'transparent';
            header.style.boxShadow = 'none';
        }
    });
</script>

</body>

</html>
