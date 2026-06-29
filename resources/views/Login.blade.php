<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #ffffff;
}

/* MAIN WRAPPER */
.container {
    display: flex;
    min-height: 100vh;
}

/* LEFT SECTION */
.left {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
}

.form-box {
    width: 100%;
    max-width: 420px;
}

.tabs {
    display: flex;
    gap: 30px;
    margin-bottom: 35px;
    font-size: 16px;
}

.tabs .active {
    border-bottom: 2px solid #0f9d8f;
    padding-bottom: 5px;
    color: #0f9d8f;
}

.tabs a {
    color: #999;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.tabs a:hover {
    color: #0f9d8f;
}

/* FLOATING INPUT */
.input-group {
    position: relative;
    margin-bottom: 22px;
}

.input-group input {
    width: 100%;
    padding: 22px 18px 10px 50px;
    border: 1px solid #ddd;
    border-radius: 14px;
    outline: none;
    font-size: 16px;
    transition: border-color 0.3s ease;
    background: #fff;
}

.input-group input:focus {
    border-color: #0f9d8f;
    border-width: 2px;
    padding: 21px 17px 9px 49px;
}

.input-group label {
    position: absolute;
    left: 50px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 16px;
    pointer-events: none;
    transition: all 0.25s ease;
    background: #fff;
    padding: 0 4px;
}

.input-group input:focus + label,
.input-group input:not(:placeholder-shown) + label {
    top: 0;
    left: 46px;
    font-size: 12px;
    color: #0f9d8f;
}

.input-group .icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    color: #888;
    transition: color 0.3s ease;
}

.input-group input:focus ~ .icon {
    color: #0f9d8f;
}

.error-message {
    color: #e74c3c;
    font-size: 12px;
    margin-top: 5px;
}

.forgot {
    font-size: 13px;
    color: #888;
    margin-bottom: 22px;
    display: block;
    text-decoration: none;
}

.forgot:hover {
    color: #0f9d8f;
}

.submit-btn {
    width: 100%;
    padding: 16px;
    border: none;
    border-radius: 14px;
    background: #0f9d8f;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    transition: background 0.3s ease;
}

.submit-btn:hover {
    background: #0d8a7e;
}

/* OR DIVIDER */
.or-divider {
    display: flex;
    align-items: center;
    margin: 22px 0;
    color: #888;
    font-size: 13px;
}

.or-divider::before,
.or-divider::after {
    content: "";
    flex: 1;
    height: 1px;
    background: #ddd;
}

.or-divider span {
    padding: 0 14px;
}

/* GOOGLE BUTTON */
.google-btn {
    width: 100%;
    padding: 14px;
    border: 1px solid #ddd;
    border-radius: 14px;
    background: #fff;
    color: #444;
    cursor: pointer;
    font-size: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: background 0.3s ease, border-color 0.3s ease;
}

.google-btn:hover {
    background: #f8f8f8;
    border-color: #bbb;
}

.google-btn svg {
    width: 20px;
    height: 20px;
}

/* RIGHT SECTION */
.right {
    flex: 1;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

/* green circular background */
.right::before {
    content: "";
    position: absolute;
    width: 800px;
    height: 800px;
    background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 50%;
    right: -200px;
    top: 50%;
    transform: translateY(-50%);
}

/* illustration placeholder */
.illustration {
    position: relative;
    text-align: center;
    z-index: 2;
}

.laptop {
    width: 200px;
    height: 130px;
    border-radius: 8px;
    margin: auto;
    position: relative;
}

.laptop::after {
    content: "";
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 120px;
    height: 10px;
    border-radius: 5px;
}

.plant {
    width: 40px;
    height: 60px;
    background: #2ecc71;
    border-radius: 10px;
    margin-left: 20px;
}

.signup-link {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
}

.signup-link a {
    color: #0f9d8f;
    text-decoration: none;
    font-weight: 600;
}

.signup-link a:hover {
    text-decoration: underline;
}

.field-error {
    color: #e74c3c;
    font-size: 12px;
    margin-top: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.input-group.has-error input {
    border-color: #e74c3c !important;
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .container {
        flex-direction: column;
    }

    .right {
        height: 300px;
        order: -1;
    }

    .right::before {
        width: 500px;
        height: 500px;
        right: -150px;
    }

    .left {
        padding: 30px 20px;
    }

    .form-box {
        max-width: 100%;
    }
}

@media (max-width: 480px) {
    .right::before {
        width: 350px;
        height: 350px;
        right: -100px;
    }

    .laptop {
        width: 140px;
        height: 90px;
    }

    .laptop::after {
        width: 80px;
        height: 7px;
        bottom: -10px;
    }

    .tabs {
        font-size: 14px;
        gap: 20px;
        margin-bottom: 25px;
    }

    .input-group input {
        padding: 20px 16px 8px 46px;
        font-size: 15px;
    }

    .input-group input:focus {
        padding: 19px 15px 7px 45px;
    }

    .input-group label {
        left: 46px;
        font-size: 15px;
    }

    .input-group input:focus + label,
    .input-group input:not(:placeholder-shown) + label {
        left: 42px;
        font-size: 11px;
    }

    .input-group .icon {
        left: 14px;
        width: 18px;
        height: 18px;
    }
}
</style>
</head>

<body>

<!-- MAIN -->
<div class="container">

    <!-- LEFT -->
    <div class="left">
        <div class="form-box">

            <div class="tabs">
                <div class="active">Login</div>
                <a href="/signup">Sign up</a>
            </div>

            <form method="POST" action="/login">
                @csrf
                
                <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" placeholder=" " value="{{ old('email') }}" required>
                    <label for="email">Email Address</label>
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                    </svg>
                    @if ($errors->has('email'))
                        <div class="field-error">
                            <span>✕</span>
                            <span>{{ $errors->first('email') }}</span>
                        </div>
                    @endif
                </div>

                <div class="input-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" placeholder=" " required>
                    <label for="password">Password</label>
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    @if ($errors->has('password'))
                        <div class="field-error">
                            <span>✕</span>
                            <span>{{ $errors->first('password') }}</span>
                        </div>
                    @endif
                </div>

                <a class="forgot" href="/forgetpassword">Forgot your password?</a>

                <button type="submit" class="submit-btn">Login</button>
            </form>

            <div class="or-divider">
                <span>or</span>
            </div>

            <button class="google-btn">
                <svg viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                Login with Google
            </button>

            <div class="signup-link">
                Don't have an account? <a href="/signup">Sign up here</a>
            </div>

        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="illustration">
            <div class="laptop"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTZ_K63znAUycV5lAPb_c7aU1N3dMMtGkZ_A&s" alt="laptop"></div>
        </div>
    </div>

</div>

</body>
</html>

