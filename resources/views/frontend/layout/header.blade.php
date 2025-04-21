
  <!-- Header -->
  <header class="bg-success text-white">
    <div class="container py-3">
      <div class="d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a href="#" class="text-white text-decoration-none">
          <h1 class="h4 mb-0">Employee System</h1>
        </a>

        <!-- Navigation -->
        <nav>
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('product.index') }}">Product</a>
              </li>
          </ul>
        </nav>

        <!-- Button -->
      </div>
    </div>
  </header>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
