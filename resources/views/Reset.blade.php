<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>
<link rel="stylesheet" href="{{ asset('assets/css/Reset.css') }}">
</head>

<body>

<div class="container">

    <!-- LEFT -->
    <div class="left">
        <div class="form-box">
            <h2>Reset Password</h2>
            <p>Enter a new password below to reset your account.</p>

            <!-- New Password -->
            <div class="input-group">
                <input type="password" id="new-password" placeholder=" " required>
                <label for="new-password">New Password</label>
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
                <input type="password" id="confirm-password" placeholder=" " required>
                <label for="confirm-password">Confirm Password</label>
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>

            <button class="submit-btn">Reset Password</button>
            <a href="/login" class="back-link">Back to Login</a>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="illustration">
            <img src="https://copilot.microsoft.com/th/id/BCO.54cdf622-b26f-4770-9955-dddfdd81427d.png" alt="Reset password illustration">
        </div>
    </div>

</div>

</body>
</html>
