<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic Finder Dashboard</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        /* Header */
        .dashboard-header {
            display: flex;
            justify-content: space-between; /* Spread items */
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position:sticky;
            top:0;
            z-index: 1000;
            transition: padding 0.3s ease;
        }
        .dashboard-header.scroll {
            padding: 5px 20px; /* Shrink the header when scrolling */
        }

        .logo img {
            height: 60px;
            background-color: #ffa500;
            padding: 5px;
            border-radius: 5px;
            transition: height 0.3 ease;
        }
        .dashboard-header.scroll .logo img {
            height: 40px;
        }

        .navigation ul {
            display: flex;
            list-style: none;
            gap: 20px;
        }

        .navigation a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .navigation a:hover {
            color: #007bff;
        }
        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #007bff;
        }

        .profile-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logout {
            color: #ff3b3b;
            cursor: pointer;
        }
        /* Hero Section with Search Bar */
        .hero-section {
            background: url('bg.jpg') no-repeat center center/cover;
            height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .hero-section h1 {
            font-size: 40px;
            color: #ffa500;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        .search-bar {
            display: flex;
            background-color: #fff;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: all 0.3s ease;
            max-width: 600px;
            width: 90%;
        }

        .search-bar input {
            flex: 1;
            border: none;
            padding: 15px;
            font-size: 16px;
            outline: none;
        }

        .search-bar button {
            background-color: #ff3b3b;
            color: #fff;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #e63333;
        }
        .search-container{
            display:flex;
            justify-content: center;
            width:100%;
        }
        .dashboard-header.scroll .search-bar {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }

        .search-bar i {
            font-size: 18px;
        }

        /* Service Categories */
        .service-categories {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: #fff;
            margin: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .category {
            text-align: center;
        }

        .category i {
            font-size: 40px;
            color: #007bff;
            margin-bottom: 10px;
            transition: transform 0.3s ease;
        }

        .category:hover i {
            transform: scale(1.1);
        }

        /* Highlight Section */
        .highlight-section {
            background-color: #ffa500;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin: 20px auto;
            font-size: 18px;
            border-radius: 10px;
            max-width: 80%;
        }

        .highlight-section h2 {
            margin: 0;
            font-size: 28px;
        }

        /* Service Cards */
        .home-services {
            padding: 20px;
            text-align: center;
        }

        .service-card {
            display: inline-block;
            width: 300px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .service-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .service-card h3 {
            margin: 10px 0;
            font-size: 20px;
        }

        .service-card p {
            color: #555;
            padding: 0 10px 10px;
        }

        .service-card:hover {
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                align-items: center;
            }

            .service-categories {
                flex-direction: column;
                align-items: center;
            }

            .search-bar {
                flex-direction: column;
            }

            .search-bar input {
                width: 100%;
            }

            .service-card {
                width: 90%;
            }
        }
        .footer {
    background-color: #333; /* Dark background color */
    color: #fff; /* White text */
    padding: 20px; /* Spacing inside the footer */
    text-align: center; /* Center align text */
    border-top: 3px solid #ff9900; /* Top border for visual separation */
    font-size: 16px; /* Font size */
    font-family: Arial, sans-serif; /* Font family */
    box-shadow: 0 -3px 5px rgba(0, 0, 0, 0.2); /* Subtle shadow effect */
}

    </style>
</head>
<body>
    <!-- Header -->
    <header class="dashboard-header" id="header">
        <div class="logo">
            <a href="{{route('index')}}"><img src="images/logo.png" alt="Mechanic Finder"></a>
        </div>
        <nav class="navigation">
            <ul>
             <?php if (!isset($_SESSION['user'])): ?>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="#">All Services</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
             <?php else: ?>
             <!-- For Logged-in Customers -->
             <li><a href="{{ route('index') }}">Home</a></li>
             <li><a href="#">Inbox</a></li>
             <li><a href="#">Order</a></li>
             <li class="profile-menu">
                 <div class="profile">
                     <img src="images/default-profile.png" alt="Profile Picture">
                 </div>
                 <a href="/profile">Profile</a>
             </li>
             <li class="logout" onclick="logoutUser()">Logout</li>
         <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- Hero Section with Search Bar -->
    <section class="hero-section">
        <h1>Your Personal Assistant</h1>
        <p>Find your trusted mechanic and other home services, anytime, anywhere.</p>
    <div class="search-container">
        <div class="search-bar" id="searchBar">
            <input type="text" placeholder="Find your service here e.g. Car, AC Repair...">
            <button>
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    </section>

    <!-- Service Categories -->
    <section class="service-categories">
        <div class="category">
            <i class="fas fa-tools"></i>
            <p>Car Repair</p>
        </div>
        <div class="category">
            <i class="fas fa-wrench"></i>
            <p>AC Repair</p>
        </div>
        <div class="category">
            <i class="fas fa-broom"></i>
            <p>Cleaning</p>
        </div>
        <div class="category">
            <i class="fas fa-user"></i>
            <p>Beauty & Wellness</p>
        </div>
        <div class="category">
            <i class="fas fa-truck-moving"></i>
            <p>Shifting</p>
        </div>
    </section>

    <!-- Highlight Section -->
    <section class="highlight-section">
        <h2>Your Trusted Partner for Hassle-Free Servicings</h2>
        <p>
            Find certified mechanics near you in just a few clicks! 
            Convenient, reliable, and affordable because your time and safety matter.
        </p>
        <a href="#get-started" class="btn-highlight">Get Started Now</a>
    </section>

    <!-- Home Services -->
    <section class="home-services">
        <h2>For Your Home</h2>
        <div class="service-card">
            <img src="images/car.png" alt="Service 1">
            <h3>Car Repair</h3>
            <p>Professional car repair services at your doorstep.</p>
        </div>
        <div class="service-card">
            <img src="images/ac.png" alt="Service 2">
            <h3>AC Repair</h3>
            <p>AC installation and repair at affordable prices.</p>
        </div>
        <div class="service-card">
            <img src="images/home.png" alt="Service 3">
            <h3>Cleaning Services</h3>
            <p>Expert cleaning services for your home and office.</p>
        </div>
    </section>
    <script>
        function logoutUser() {
            // Placeholder for logout logic
            alert("You have been logged out.");
            window.location.href = 'index'; 
        }
        const header = document.getElementById("header");
        const searchBar = document.getElementById("searchBar");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                header.classList.add("scroll");
                searchBar.classList.add("scroll");
            } else {
                header.classList.remove("scroll");
                searchBar.classList.remove("scroll");
            }
        });
    </script>
    <div class="footer">
        <p>&copy; {{ date('Y') }} HASAN SARKAR. All rights reserved.</p>
    </div>
</body>
</html>
