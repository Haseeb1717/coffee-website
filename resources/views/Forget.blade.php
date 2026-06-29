<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forget Password</title>

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
    padding: 18px 16px 10px 50px; /* space for icon */
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
        display: none;
    }
}

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
        display: none;
    }
}
</style>
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
