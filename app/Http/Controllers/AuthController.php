<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Handle login request with rate limiting
     */
    public function login(Request $request)
    {
        // Rate limiting - 5 attempts per 15 minutes
        $this->ensureIsNotRateLimited($request);

        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Please provide a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = auth()->user();

            // Check if email is verified
            if (!$user->email_verified_at) {
                Auth::logout();
                return redirect('/verify-email')->with('warning', 'Please verify your email first.');
            }

            // Clear rate limit on successful login
            RateLimiter::clear($this->throttleKey($request));
            
            $request->session()->regenerate();

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Welcome back, admin!');
            }

            return redirect('/dashboard')->with('success', 'Logged in successfully!');
        }

        // Increment failed attempts
        RateLimiter::hit($this->throttleKey($request), 900);

        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Show the signup form
     */
    public function showSignup()
    {
        return view('signup');
    }

    /**
     * Handle signup request with comprehensive validation
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s\.\'&-]+$/' // Only letters, spaces, dots, apostrophes, ampersands, hyphens
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/' // Strong password
            ],
        ], [
            'name.required' => 'Full name is required',
            'name.regex' => 'Name can only contain letters, spaces, dots, apostrophes, and hyphens',
            'email.required' => 'Email is required',
            'email.email' => 'Please provide a valid email address',
            'email.unique' => 'This email is already registered',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Passwords do not match',
            'password.regex' => 'Password must contain uppercase, lowercase, number, and special character (@$!%*?&)',
        ]);

        // Check if user already exists by email
        if (User::where('email', $validated['email'])->exists()) {
            throw ValidationException::withMessages([
                'email' => 'An account with this email already exists.',
            ]);
        }

        try {
            $user = User::create([
                'name' => trim($validated['name']),
                'email' => strtolower(trim($validated['email'])),
                'password' => Hash::make($validated['password']),
                'role' => 'customer',
            ]);

            // Auto-login user
            Auth::login($user);

            try {
                // Send verification email
                Mail::send(new VerifyEmail($user));
                
                return redirect('/verify-email')->with('success', 'Account created! Please check your email to verify your account.');
            } catch (\Exception $mailException) {
                // Log the mail error but don't delete user
                \Log::error('Email sending failed: ' . $mailException->getMessage());
                
                // Still redirect to verify-email with warning
                return redirect('/verify-email')->with('warning', 'Account created! Email sending had issues, but you can resend it on the next page.');
            }
        } catch (\Exception $e) {
            \Log::error('Registration error: ' . $e->getMessage());
            
            throw ValidationException::withMessages([
                'email' => 'Registration failed. Please check all fields and try again.',
            ]);
        }
    }

    /**
     * Show email verification page
     */
    public function showVerifyEmail()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->email_verified_at) {
            return redirect('/')->with('success', 'Your email is already verified!');
        }

        return view('verify-email');
    }

    /**
     * Verify email with signed URL
     */
    public function verifyEmail(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/login')->with('error', 'Invalid verification link.');
        }

        // Verify the hash
        if (sha1($user->email) !== $request->route('hash')) {
            return redirect('/login')->with('error', 'Invalid verification link.');
        }

        // Check if already verified
        if ($user->email_verified_at) {
            return redirect('/dashboard')->with('success', 'Your email is already verified!');
        }

        // Mark email as verified
        $user->email_verified_at = now();
        $user->save();

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Email verified successfully! Welcome to Coffee Shop!');
    }

    /**
     * Resend verification email
     */
    public function resendVerificationEmail(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();

        // Check if already verified
        if ($user->email_verified_at) {
            return redirect('/')->with('success', 'Your email is already verified!');
        }

        // Rate limiting - max 3 resend attempts per hour
        $key = 'verify-email-' . $user->id;
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->with('error', 'Too many resend attempts. Please try again later.');
        }

        try {
            Mail::send(new VerifyEmail($user));
            RateLimiter::hit($key, 3600);
            return back()->with('success', 'Verification email sent! Please check your inbox.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send verification email. Please try again.');
        }
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully!');
    }

    /**
     * Ensure login attempt is not rate limited
     */
    protected function ensureIsNotRateLimited(Request $request)
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the throttle key for the given request
     */
    protected function throttleKey(Request $request)
    {
        return Str::transliterate(Str::lower($request->input('email')) . '|' . $request->ip());
    }
}
