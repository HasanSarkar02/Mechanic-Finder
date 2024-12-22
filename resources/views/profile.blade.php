@extends('layouts.app')
@section('content')
@include('partials.header')

<style>
    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 20px;
    }

    .card {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .card-header {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .profile-img {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-img img {
        border-radius: 50%;
    }

    form {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="tel"],
    textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    textarea {
        resize: vertical;
        height: 100px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
    }

    /* Header styles */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f8f9fa;
        padding: 10px 20px;
        border-bottom: 1px solid #ccc;
        position:sticky;
        top:0;
    }

    .header .nav-links {
        display: flex;
        gap: 20px;
    }

    .header .nav-links a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .header .profile {
        display: flex;
        align-items: center;
    }

    .header .profile img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    /* Footer styles */
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

<!-- Header Section -->
<div class="header">
    <div class="nav-links">
        <a href="{{ route('home') }}">Home</a>
        <a href="#">All Services</a>
    </div>

    <div class="profile">
        @if(Auth::user()->profile_img)
            <img src="{{ asset('storage/' . Auth::user()->profile_img) }}" alt="Profile Picture" width="40" height="40">
        @else
            <img src="{{ asset('images/default-profile.png') }}" alt="Default Picture" width="40" height="40">
        @endif
        <span>{{ Auth::user()->name }}</span>
    </div>
</div>

<!-- Profile Section -->
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>My Profile</h2>
        </div>

        <div class="card-body">
            <div class="profile-img">
                @if(Auth::user()->profile_img)
                    <img src="{{ asset('storage/' . Auth::user()->profile_img) }}" alt="Profile Picture" width="150" height="150">
                @else
                    <img src="{{ asset('images/default-profile.png') }}" alt="Default Picture" width="150" height="150">
                @endif
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
            
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" value="{{ Auth::user()->phone }}">
            
                <label for="location">Address</label>
                <textarea id="location" name="location">{{ Auth::user()->location}}</textarea>
            
                <label for="profile_img">Upload Profile Picture</label>
                <input type="file" id="profile_img" name="profile_img">
            
                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>
</div>

@include('partials.footer') <!-- Include footer -->
@endsection

@section('footer')
<div class="footer">
    <p>&copy; {{ date('Y') }} HASAN SARKAR. All rights reserved.</p>
</div>
@endsection
