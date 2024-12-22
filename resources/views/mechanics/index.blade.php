<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic Finder</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
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
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 4px 0 0 4px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            background-color: #007BFF;
            color: #fff;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }
        .logout{
            color:#ff3b3b
        }
        button:hover {
            background-color: #0056b3;
        }
        .mechanic-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .mechanic-card {
            padding: 20px;
            background: #f1f1f1;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .mechanic-card h3 {
            margin: 0 0 10px;
            color: #333;
        }
        .mechanic-card p {
            margin: 5px 0;
            color: #666;
        }
        .mechanic-card .rating {
            color: #ff9900;
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
    <header class="dashboard-header" id="header">
        <div class="logo">
            <a href="{{ route('index') }}"><img src="images/logo.png" alt="Mechanic Finder"></a>
        </div>
        <nav class="navigation">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">All Services</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout">Logout</button>
                    </form>
                @endguest
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Find Mechanics Nearby</h1>

        <form action="{{ route('mechanics.index') }}" method="GET">
            <input type="text" name="location" value="{{ old('location', $location) }}" placeholder="Enter your location">
            <button type="submit">Search</button>
        </form>

        <div class="mechanic-list">
            @forelse($mechanics as $mechanic)
                <div class="mechanic-card">
                    <h3>{{ $mechanic->name }}</h3>
                    <p><strong>Location:</strong> {{ $mechanic->location }}</p>
                    <p><strong>Specialization:</strong> {{ $mechanic->specialization }}</p>
                    <p><strong>Contact:</strong> {{ $mechanic->phone }}</p>
                    <p class="rating">Rating: 
                        @for ($i = 1; $i <= 5; $i++)
                            {!! $i <= $mechanic->rating ? '&#9733;' : '&#9734;' !!}
                        @endfor
                    </p>
                </div>
            @empty
                <p>No mechanics found in this location.</p>
            @endforelse
        </div>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} HASAN SARKAR. All rights reserved.</p>
    </div>
</body>
</html>
