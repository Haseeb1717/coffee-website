<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forget Password</title>
<link rel="stylesheet" href="{{ asset('assets/css/Forget.css') }}">
</head>

<body>

<div class="container">

    <!-- LEFT -->
    <div class="left">
        <div class="form-box">
            <h2>Forget Password</h2>
            <p>Enter your email address and we’ll send you reset instructions.</p>

            <!-- Email -->
            <div class="input-group">
                <input type="email" id="email" placeholder=" " required>
                <label for="email">Email Address</label>
                <!-- Email icon inside input -->
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" 
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="4" width="20" height="16" rx="2" ry="2"/>
                    <polyline points="2,4 12,13 22,4"/>
                </svg>
            </div>

            <button class="submit-btn">Send Link</button>
            <a href="/login" class="back-link">Back to Login</a>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="illustration">
            <img src="https://copilot.microsoft.com/th/id/BCO.54cdf622-b26f-4770-9955-dddfdd81427d.png" alt="Forget password illustration">
        </div>
    </div>

</div>

</body>
</html>
