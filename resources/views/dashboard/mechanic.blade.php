<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="dashboard-container">
        <h2>Welcome, {{ Auth::user()->name }}</h2>
        <p>You are logged in as a <strong>Mechanic</strong>.</p>

        <div class="info-section">
            <h3>Offered Services</h3>
            <p>Manage the services you offer to your customers.</p>
        </div>

        <div class="info-section">
            <h3>Working Hours</h3>
            <p>View and update your working hours.</p>
        </div>

        <div class="info-section">
            <h3>Customer Requests</h3>
            <p>View bookings and interact with your customers.</p>
        </div>

        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>

</body>
</html>
