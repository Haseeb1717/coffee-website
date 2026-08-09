<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="{{ asset('assets/css/Login.css') }}">
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

