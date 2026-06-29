<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: linear-gradient(135deg, #f9f9f9, #e6f7f5);
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
    background: transparent;
    padding: 30px;
    border-radius: 16px;
}

.form-box h2 {
    font-size: 22px;
    margin-bottom: 10px;
    color: #0f9d8f;
}

.form-box p {
    font-size: 14px;
    color: #444;
    margin-bottom: 25px;
}

/* INPUTS */
.input-group {
    position: relative;
    margin-bottom: 22px;
}

.input-group input {
    width: 100%;
    padding: 18px 16px 10px 50px;
    border: 1px solid rgba(15,157,143,0.4);
    border-radius: 14px;
    outline: none;
    font-size: 15px;
    transition: border-color 0.3s ease;
    background: transparent;
    color: #333;
}

.input-group input:focus {
    border-color: #0f9d8f;
    border-width: 2px;
}

.input-group label {
    position: absolute;
    left: 50px;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
    font-size: 15px;
    pointer-events: none;
    transition: all 0.25s ease;
    background: transparent;
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
}

/* BUTTONS */
.submit-btn {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 14px;
    background: #0f9d8f;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    transition: background 0.3s ease;
    margin-bottom: 15px;
}

.submit-btn:hover {
    background: #0d8a7e;
}

.back-link {
    display: block;
    text-align: center;
    font-size: 14px;
    color: #0f9d8f;
    text-decoration: none;
    margin-top: 10px;
}

/* RIGHT SECTION */
.right {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
}

.illustration img {
    max-width: 80%;
    height: auto;
}

/* RESPONSIVE DESIGN */

/* Tablet breakpoint */
@media (max-width: 900px) {
    .container {
        flex-direction: column;
    }
    .right {
        order: -1;
        padding: 20px;
    }
    .form-box {
        max-width: 100%;
        padding: 20px;
    }
}

/* Extra breakpoint: 764px */
@media (max-width: 764px) {
    .form-box h2 {
        font-size: 20px;
    }
    .form-box p {
        font-size: 13px;
    }
    .input-group input {
        padding: 16px 14px 8px 46px;
        font-size: 14px;
    }
    .input-group label {
        font-size: 13px;
    }
    .submit-btn {
        font-size: 15px;
        padding: 12px;
    }
    .illustration {
        display: none; /* hide illustration on tablets */
    }
}

/* Mobile breakpoint */
@media (max-width: 480px) {
    .form-box h2 {
        font-size: 18px;
    }
    .form-box p {
        font-size: 12px;
    }
    .input-group input {
        font-size: 13px;
    }
    .submit-btn {
        font-size: 14px;
        padding: 10px;
    }
    .illustration {
        display: none; /* hide illustration on phones */
    }
}
</style>
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
