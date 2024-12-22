<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Link external CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/fortawesome/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <style>
        /* Inline CSS for simplicity - move to external file if needed */
        body {
            margin: 0;
            padding: 0;
            background-color: #f3b500;
            font-family: Arial, sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-transform: uppercase;
        }

        button:hover {
            background-color: #333;
        }

        .register-link, .guest-link {
            text-align: center;
            margin-top: 15px;
            color: #555;
        }

        .register-link a,
        .guest-link a {
            color: #f3b500;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover,
        .guest-link a:hover {
            text-decoration: underline;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-icons img {
            width: 30px;
            height: 30px;
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
    <div class="login-container">
        <h2>Log In</h2>
        <!-- Display Errors -->
        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>

            <div style="text-align: right; margin-bottom: 10px;">
                <a href="#" style="color: #f3b500; text-decoration: none;">Forgot Password?</a>
            </div>

            <button type="submit">Log In</button>
        </form>

        <!-- Register and Guest Links -->
        <p class="register-link">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        <p class="guest-link" ><a href="{{ route('index') }}">Continue as Guest </a></p>

        <!-- Social Login Icons -->
        <div class="social-icons">
            <a href="www.facebook.com"><i class="fab fa-facebook-f" alt="Facebook"></i> </a>
            <a href="www.google.com"><i class="fab fa-google" alt="Google"></i> </a>
            <a href="www.apple.com"><i class="fab fa-apple" alt="Apple"></i> </a>
            

        </div>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} HASAN SARKAR. All rights reserved.</p>
    </div>
</body>
</html>
