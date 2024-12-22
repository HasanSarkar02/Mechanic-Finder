<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Include CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Include JS -->
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>

    <div class="register-container">
        <h2>Register</h2>

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <!-- Name -->
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <!-- Email -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <!-- Phone -->
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>

            <!-- Gender -->
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <!-- Location -->
            <label for="location">Location</label>
            <input type="text" id="location" name="location" placeholder="Enter your location" required>

            <!-- Role -->
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="customer">Customer</option>
                <option value="mechanic">Mechanic</option>
            </select>

            <!-- Offered Services (only for mechanics) -->
            <div id="offered_services_field" class="hidden">
                <label for="offered_services">Offered Services</label>
                <input type="text" id="offered_services" name="offered_services" placeholder="Enter your offered services">
            </div>

            <!-- Working Hours (only for mechanics) -->
            <div id="working_hours_field" class="hidden">
                <label for="working_hours">Working Hours</label>
                <input type="text" id="working_hours" name="working_hours" placeholder="Enter your working hours">
            </div>

            <!-- Password -->
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>

            <!-- Confirm Password -->
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>

            <!-- Register Button -->
            <button type="submit">REGISTER</button>
        </form>

        <!-- Sign In Link -->
        <p class="login-link">
            Already have an account? <a href="{{ route('login') }}">Sign In</a>
        </p>
    </div>

</body>
</html>
