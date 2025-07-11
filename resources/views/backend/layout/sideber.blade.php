<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f5f7;
        margin: 0;
        padding: 0;
        display: flex;
    }

    /* Sidebar Container */
    .sidebar {
        width: 250px;
        background-color: #1d1f27;
        color: #ffffff;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        padding: 20px 0;
    }

    /* Sidebar Header */
    .sidebar h3 {
        font-size: 22px;
        font-weight: bold;
        text-align: center;
        color: #ffffff;
        margin-bottom: 20px;
        border-bottom: 2px solid #343744;
        padding-bottom: 10px;
    }

    /* Search Bar Style */
    .sidebar .search-box {
        padding: 10px 20px;
        background-color: #2d2f39;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        border-radius: 5px;
    }

    .sidebar .search-box input {
        width: 100%;
        padding: 10px;
        background-color: #343744;
        border: 1px solid #444c57;
        color: #ffffff;
        border-radius: 5px;
        font-size: 14px;
    }

    .sidebar .search-box input::placeholder {
        color: #bbbbbb;
    }

    .sidebar .search-box i {
        color: #bbbbbb;
        font-size: 18px;
        margin-right: 10px;
    }

    /* Sidebar Links */
    .sidebar a {
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 15px 20px;
        font-size: 16px;
        color: #ffffff;
        transition: background-color 0.3s, padding-left 0.3s;
    }

    .sidebar a i {
        margin-right: 15px;
        font-size: 18px;
    }

    .sidebar a:hover {
        background-color: #343744;
        padding-left: 25px;
    }

    /* Dropdown Submenu Styling */
    .sidebar .dropdown-toggle {
        cursor: pointer;
        display: flex;
        align-items: center;
        padding: 15px 20px;
        font-size: 16px;
        color: #ffffff;
        transition: background-color 0.3s, padding-left 0.3s;
    }

    .sidebar .dropdown-toggle i {
        margin-right: 15px;
        font-size: 18px;
    }

    .sidebar .dropdown-toggle:hover {
        background-color: #343744;
        padding-left: 25px;
    }

    .sidebar .submenu {
        display: none;
        flex-direction: column;
        background-color: #2d2f39;
        padding-left: 20px;
    }

    .sidebar .submenu a {
        font-size: 14px;
        padding: 10px 20px;
    }

    .sidebar .submenu a:hover {
        padding-left: 25px;
    }

    /* Footer Section */
    .sidebar .footer {
        margin-top: auto;
        text-align: center;
        padding: 15px;
        border-top: 1px solid #2d2f39;
    }

    .sidebar .footer a {
        color: #ff6b6b;
        font-size: 14px;
        text-decoration: none;
        transition: color 0.3s;
    }

    .sidebar .footer a:hover {
        color: #ff9b9b;
    }
</style>

<body>

    <div class="sidebar">
        <!-- Sidebar Header -->
        <h3>Dashboard</h3>

        <!-- Search Box -->
        <div class="search-box">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Search..." id="sidebar-search">
        </div>

        <!-- Sidebar Links -->
        <a href="{{ route('admin.banners.index') }}">
            <i class="fa-solid fa-house-user"></i> Dashboard
        </a>

        <a href="{{ route('admin.banners.index') }}">
            <i class="fa-regular fa-user"></i> All Banner
        </a>

        <a href="{{ route('admin.categories.index') }}">
            <i class="fa-regular fa-user"></i> All Categories
        </a>

        {{-- <a href="{{ route('employee.index') }}">
            <i class="fa-regular fa-user"></i> Employee List
        </a> --}}

        {{-- <a href="{{ route('employee.create') }}">
            <i class="fa-solid fa-plus"></i> Add Employee
        </a> --}}

        {{-- <a href="{{ route('tasks.index') }}">
            <i class="fa-solid fa-list-check"></i> Employee Task List
        </a>

        <a href="{{ route('tasks.create') }}">
            <i class="fa-solid fa-plus"></i> Add Employee Task
        </a> --}}

        {{-- <a href="{{ route('admin.products.index') }}">
            <i class="fa-solid fa-plus"></i> All Products
        </a> --}}

    </div>

    <script>
        // Toggle Submenu Visibility
        function toggleSubmenu(element) {
            const submenu = element.nextElementSibling;

            // Toggle "active" class and submenu display
            if (submenu.style.display === 'flex') {
                submenu.style.display = 'none';
                element.classList.remove('active');
            } else {
                submenu.style.display = 'flex';
                element.classList.add('active');
            }
        }

        // Search Bar Functionality
        const searchInput = document.getElementById('sidebar-search');
        const sidebarLinks = document.querySelectorAll('.sidebar a');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();

            sidebarLinks.forEach(link => {
                const linkText = link.textContent.toLowerCase();
                if (linkText.includes(query)) {
                    link.style.display = 'flex';
                } else {
                    link.style.display = 'none';
                }
            });
        });
    </script>
</body>
