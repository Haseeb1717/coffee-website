<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Coffee Shop</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f5f7fa;
        }

        /* NAVBAR */
        .navbar {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #0f9d8f;
            text-decoration: none;
        }

        .navbar-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .navbar-menu a {
            color: #333;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-menu a:hover {
            color: #0f9d8f;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            color: #333;
        }

        .user-email {
            font-size: 12px;
            color: #666;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #0f9d8f, #0d8a7e);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .logout-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        /* CONTAINER */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* WELCOME SECTION */
        .welcome-card {
            background: linear-gradient(135deg, #0f9d8f 0%, #0d8a7e 100%);
            color: white;
            padding: 40px;
            border-radius: 12px;
            margin-bottom: 40px;
            box-shadow: 0 5px 20px rgba(15, 157, 143, 0.3);
        }

        .welcome-card h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .welcome-card p {
            font-size: 16px;
            opacity: 0.95;
        }

        /* VERIFIED BADGE */
        .verified-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 15px;
            border-radius: 20px;
            margin-top: 15px;
            width: fit-content;
            font-size: 14px;
        }

        .verified-badge::before {
            content: "✓";
            font-weight: bold;
            font-size: 16px;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        /* CARD */
        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        .card-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .card h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .card-link {
            color: #0f9d8f;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: gap 0.3s ease;
        }

        .card-link:hover {
            gap: 10px;
        }

        /* USER INFO CARD */
        .user-info-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .user-info-card h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 25px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #666;
            font-weight: 500;
        }

        .info-value {
            color: #333;
            font-weight: 600;
        }

        .edit-btn {
            background: #0f9d8f;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .edit-btn:hover {
            background: #0d8a7e;
        }

        /* SUCCESS MESSAGE */
        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message::before {
            content: "✓";
            font-weight: bold;
            font-size: 18px;
        }

        /* FOOTER */
        .footer {
            background: white;
            padding: 30px;
            text-align: center;
            color: #666;
            font-size: 13px;
            border-top: 1px solid #f0f0f0;
            margin-top: 60px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .navbar-menu {
                gap: 15px;
            }

            .welcome-card {
                padding: 30px 20px;
            }

            .welcome-card h1 {
                font-size: 24px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .user-menu {
                gap: 10px;
            }

            .user-info {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-brand">☕ Coffee Shop</a>
            <div class="navbar-menu">
                <a href="/">Home</a>
                <a href="#products">Products</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
            </div>
            <div class="user-menu">
                <div class="user-info">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-email">{{ auth()->user()->email }}</div>
                </div>
                <div class="user-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                <form method="POST" action="/logout" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="container">
        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <!-- WELCOME SECTION -->
        <div class="welcome-card">
            <h1>Welcome back, {{ auth()->user()->name }}! ☕</h1>
            <p>Your account is all set up and ready to use. Start exploring our premium coffee collection.</p>
            <div class="verified-badge">
                Email verified on {{ auth()->user()->email_verified_at->format('M d, Y') }}
            </div>
        </div>

        <!-- QUICK ACTIONS -->
        <div class="grid">
            <div class="card">
                <div class="card-icon">🛍️</div>
                <h3>Browse Products</h3>
                <p>Explore our collection of premium coffee beans, equipment, and accessories.</p>
                <a href="/" class="card-link">Shop now →</a>
            </div>

            <div class="card">
                <div class="card-icon">📦</div>
                <h3>My Orders</h3>
                <p>View your order history, track shipments, and manage your purchases.</p>
                <a href="#" class="card-link">View orders →</a>
            </div>

            <div class="card">
                <div class="card-icon">❤️</div>
                <h3>Wishlist</h3>
                <p>Keep track of your favorite products and get notified when they're on sale.</p>
                <a href="#" class="card-link">View wishlist →</a>
            </div>
        </div>

        <!-- USER INFORMATION -->
        <div class="user-info-card">
            <h3>Account Information</h3>
            
            <div class="info-row">
                <span class="info-label">Full Name</span>
                <span class="info-value">{{ auth()->user()->name }}</span>
            </div>

            <div class="info-row">
                <span class="info-label">Email Address</span>
                <span class="info-value">{{ auth()->user()->email }}</span>
            </div>

            <div class="info-row">
                <span class="info-label">Email Status</span>
                <span class="info-value" style="color: #27ae60;">✓ Verified</span>
            </div>

            <div class="info-row">
                <span class="info-label">Account Created</span>
                <span class="info-value">{{ auth()->user()->created_at->format('M d, Y') }}</span>
            </div>

            <div class="info-row">
                <span class="info-label">Last Updated</span>
                <span class="info-value">{{ auth()->user()->updated_at->format('M d, Y') }}</span>
            </div>

            <button class="edit-btn">Edit Profile</button>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <p>&copy; 2024 Coffee Shop. All rights reserved. | Secure Authentication System</p>
    </footer>
</body>
</html>
