
  <!-- Header -->
  <header class="text-white" style="background: transparent; position: fixed; top: 0; width: 100%; z-index: 1000;">
    <div class="container py-3">
      <div class="d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a href="/" class="text-warning text-decoration-none">
          <h1 class="h4 mb-0">E-System</h1>
        </a>

        <!-- Desktop Navigation -->
        <nav class="d-none d-md-block">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link text-warning" href="/"
                 style="border-bottom: 2px solid transparent;"
                 onmouseover="this.style.borderBottom='2px solid white'"
                 onmouseout="this.style.borderBottom='2px solid transparent'">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-warning" href="#"
                 style="border-bottom: 2px solid transparent;"
                 onmouseover="this.style.borderBottom='2px solid white'"
                 onmouseout="this.style.borderBottom='2px solid transparent'">
                About
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-warning" href="#"
                 style="border-bottom: 2px solid transparent;"
                 onmouseover="this.style.borderBottom='2px solid white'"
                 onmouseout="this.style.borderBottom='2px solid transparent'">
                Services
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-warning" href="#"
                 style="border-bottom: 2px solid transparent;"
                 onmouseover="this.style.borderBottom='2px solid white'"
                 onmouseout="this.style.borderBottom='2px solid transparent'">
                Contact
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-warning" href="{{ route('product.index') }}"
                 style="border-bottom: 2px solid transparent;"
                 onmouseover="this.style.borderBottom='2px solid white'"
                 onmouseout="this.style.borderBottom='2px solid transparent'">
                Product
              </a>
            </li>
          </ul>
        </nav>

        <!-- Mobile Navigation (Hamburger Button) -->
        <button class="d-md-none navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
</body>
</html>
