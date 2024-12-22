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
        .profile img:hover{
            border: 3px solid #ffa500
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
                @guest
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="#">All Services</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <!-- For Logged-in Customers -->
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="#">Inbox</a></li>
                    <li><a href="#">Order</a></li>
                    <li class="profile-menu">
                        <div class="profile">
                            <img src="images/profile.jpg" alt="Profile Picture">
                        </div>
                        <a href="{{ route('profile') }}">Profile</a>
                    </li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout">Logout</button>
                    </form>                    
                    
                @endguest
            </ul>
            
        </nav>
    </header>