# 🔧 Registration Error Troubleshooting Guide

## Common Registration Errors

### Error: "An error occurred during registration. Please try again."

This generic error can have several causes. Follow the troubleshooting steps below:

---

## ✅ Fix Step 1: Check Database Migrations

Make sure all database tables are created.

### Run Migrations:
```bash
php artisan migrate
```

Expected output:
```
Migrating: 0001_01_01_000000_create_users_table.php
Migrated: 0001_01_01_000000_create_users_table (XXXms)
...
```

**If you see errors:**
- Check database connection in `.env` file
- Verify database exists
- Run `php artisan migrate:reset` then `php artisan migrate`

---

## ✅ Fix Step 2: Check Email Configuration

The most common issue is SMTP settings not configured.

### Check Current Mail Settings:
```bash
php artisan tinker
```

Then type:
```php
config('mail.driver')
config('mail.host')
```

Should show: `smtp` and `smtp.gmail.com`

### Configure Gmail SMTP:

**1. Update .env file:**
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-16-char-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Coffee Shop"
```

**2. Clear configuration cache:**
```bash
php artisan config:cache
php artisan config:clear
```

**3. Test email sending:**
```bash
php artisan tinker
```

Then:
```php
Mail::raw('Test email', function($message) {
    $message->to('your-email@gmail.com');
});
```

---

## ✅ Fix Step 3: Check Password Requirements

Your password must contain:
- ✓ At least 8 characters
- ✓ One uppercase letter (A-Z)
- ✓ One lowercase letter (a-z)
- ✓ One number (0-9)
- ✓ One special character (@$!%*?&)

### Example Valid Passwords:
```
✓ SecurePass123!@
✓ MyPass@Word123
✓ Coffee$123Shop
✓ Test@Pass999
```

### Example Invalid Passwords:
```
✗ password123       - no uppercase, no special char
✗ Password123      - no special char
✗ PASS123!@        - no lowercase
✗ Pass!@           - too short
```

---

## ✅ Fix Step 4: Check Logs

View application logs to see the actual error:

```bash
tail -f storage/logs/laravel.log
```

Or on Windows PowerShell:
```powershell
Get-Content storage/logs/laravel.log -Tail 50 -Wait
```

Look for errors like:
- `SQLSTATE[...] - Database error`
- `Expected response code 250 but got code "535" - SMTP authentication failed`
- `Connection refused - Unable to connect to mail server`

---

## ✅ Fix Step 5: Verify Email Format

Your email must be valid. Check:
- ✓ Contains @ symbol
- ✓ Has domain name (e.g., gmail.com)
- ✓ No spaces
- ✓ Maximum 255 characters

### Valid Emails:
```
✓ user@gmail.com
✓ john.doe@example.com
✓ test123@domain.co.uk
```

### Invalid Emails:
```
✗ usergmail.com     - missing @
✗ user@             - missing domain
✗ user @gmail.com   - has space
✗ user@@gmail.com   - double @
```

---

## ✅ Fix Step 6: Check User Already Exists

If you see: "This email is already registered"

This email has already been registered. Either:
1. Login with existing account
2. Use a different email
3. Reset the database: `php artisan migrate:reset`

---

## 🧪 Testing Registration with Correct Data

Test with this format:

| Field | Value |
|-------|-------|
| Name | John Doe |
| Email | your-real-email@gmail.com |
| Password | SecurePass123!@ |
| Confirm | SecurePass123!@ |

**Steps:**
1. Go to `/signup`
2. Fill in the form exactly as above
3. Click "Create Account"
4. Check your email inbox (including Spam folder)

---

## 📧 Gmail App Password Setup

If you get **"SMTP authentication failed"** error:

### Step 1: Enable 2-Factor Authentication
1. Go to: https://myaccount.google.com
2. Click "Security" in left menu
3. Enable "2-Step Verification"
4. Choose verification method and complete

### Step 2: Generate App Password
1. Go to: https://myaccount.google.com/apppasswords
2. Select App: "Mail"
3. Select Device: "Windows Computer" (or your OS)
4. Click "Generate"
5. Google shows 16-character password
6. Copy this password (including spaces)

### Step 3: Use in .env
```
MAIL_PASSWORD=abc defg hijk lmno
```

---

## 🆘 Still Having Issues?

### Check these files exist:
```
✓ app/Http/Controllers/AuthController.php
✓ app/Mail/VerifyEmail.php
✓ app/Http/Middleware/EnsureEmailIsVerified.php
✓ resources/views/emails/verify.blade.php
✓ resources/views/signup.blade.php
✓ resources/views/verify-email.blade.php
```

### Clear all caches:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Then test again:
1. Restart Laravel: `php artisan serve`
2. Go to `/signup`
3. Register with test data

---

## 📝 Quick Checklist

Before registering, verify:
- [ ] Database migrated (`php artisan migrate`)
- [ ] .env has MAIL_MAILER=smtp
- [ ] Gmail SMTP credentials correct in .env
- [ ] 2-Factor Authentication enabled on Gmail
- [ ] App password generated from Google
- [ ] Caches cleared (`php artisan config:cache`)
- [ ] Password meets all requirements
- [ ] Email is valid format
- [ ] Email not already registered

---

## 🎯 Success Indicators

When registration works correctly, you should see:

1. ✓ Form submitted successfully
2. ✓ User account created in database
3. ✓ Redirect to `/verify-email` page
4. ✓ "Check your email" message displayed
5. ✓ Email received in inbox with verification link
6. ✓ Click link and email marked as verified
7. ✓ Redirect to `/dashboard`
8. ✓ Welcome message shown

---

**Last Updated:** 2026-06-30  
**Version:** 1.0
