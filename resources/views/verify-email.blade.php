<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="{{ asset('assets/css/verify-email.css') }}">
    
</head>
<body>
    <div class="container">
        <div class="icon">📧</div>

        <h1>Verify Your Email</h1>
        <p class="subtitle">A verification link has been sent to your email. Please check your inbox and click the link to activate your account.</p>

        @if (session('warning'))
            <div style="background: #fff3cd; border: 1px solid #ffc107; color: #856404; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <strong>⚠️ Note:</strong> {{ session('warning') }}
            </div>
        @endif

        @if (session('success'))
            <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <strong>✓ Success:</strong> {{ session('success') }}
            </div>
        @endif

        <div class="email-display">
            {{ auth()->user()->email }}
        </div>

        <div class="steps">
            <h3>What's Next?</h3>
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-text">Check your email inbox for a message from us</div>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-text">Click the "Verify Email Address" button in the email</div>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-text">You'll be redirected back to our site and your account will be activated</div>
            </div>
        </div>

        <div class="info-box">
            <strong>⏱️ Tip:</strong> The verification link expires in 24 hours. Check your spam/junk folder if you don't see the email in your inbox.
        </div>

        <div class="button-group">
            <form method="POST" action="/resend-verification-email" style="width: 100%;">
                @csrf
                <button type="submit" class="btn btn-primary" style="width: 100%; cursor: pointer;">Resend Verification Email</button>
            </form>
            <a href="/" class="btn btn-secondary" style="width: 100%;">Back to Home</a>
        </div>

        <div class="resend-link">
            <p style="color: #666; font-size: 12px; margin-bottom: 10px;">Already verified your email?</p>
            <a href="/login">Login to your account</a>
        </div>
    </div>
</body>
</html>
