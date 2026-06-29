<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #0f9d8f;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .content {
            color: #333;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            background-color: #0f9d8f;
            color: #ffffff;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #0d8a7e;
        }
        .footer {
            border-top: 1px solid #ddd;
            padding-top: 20px;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
        .info-box {
            background-color: #f9f9f9;
            border-left: 4px solid #0f9d8f;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>☕ Coffee Shop</h1>
            <p>Verify Your Email Address</p>
        </div>

        <div class="content">
            <p>Hi <strong>{{ $user->name }}</strong>,</p>

            <p>Welcome to Coffee Shop! To complete your registration and activate your account, please verify your email address by clicking the button below:</p>

            <div style="text-align: center;">
                <a href="{{ $verificationUrl }}" class="button">Verify Email Address</a>
            </div>

            <div class="info-box">
                <strong>Note:</strong> This verification link will expire in 24 hours. If you didn't create this account, please ignore this email.
            </div>

            <p>If the button doesn't work, you can also copy and paste this link in your browser:</p>
            <p style="background-color: #f0f0f0; padding: 10px; border-radius: 4px; word-break: break-all; font-size: 12px;">
                {{ $verificationUrl }}
            </p>

            <p>Thank you for joining us!</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Coffee Shop. All rights reserved.</p>
            <p>If you have any questions, please contact us at support@coffeeshop.com</p>
        </div>
    </div>
</body>
</html>
