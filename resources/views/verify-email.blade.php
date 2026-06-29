<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            padding: 50px;
            text-align: center;
        }

        .icon {
            width: 80px;
            height: 80px;
            background: #0f9d8f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 40px;
        }

        h1 {
            color: #333;
            margin-bottom: 15px;
            font-size: 28px;
        }

        .subtitle {
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .email-display {
            background: #f0f0f0;
            padding: 15px;
            border-radius: 8px;
            margin: 25px 0;
            word-break: break-all;
            font-weight: bold;
            color: #0f9d8f;
        }

        .steps {
            text-align: left;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }

        .steps h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .step {
            display: flex;
            margin-bottom: 12px;
            align-items: flex-start;
        }

        .step-number {
            background: #0f9d8f;
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .step-text {
            color: #555;
            font-size: 14px;
            line-height: 1.5;
        }

        .info-box {
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 8px;
            padding: 15px;
            margin: 25px 0;
            color: #856404;
            font-size: 13px;
            line-height: 1.5;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            flex-direction: column;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #0f9d8f;
            color: white;
        }

        .btn-primary:hover {
            background: #0d8a7e;
        }

        .btn-secondary {
            background: #e8e8e8;
            color: #333;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: #d8d8d8;
        }

        .resend-link {
            margin-top: 20px;
            text-align: center;
        }

        .resend-link a {
            color: #0f9d8f;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .resend-link a:hover {
            text-decoration: underline;
        }

        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
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
