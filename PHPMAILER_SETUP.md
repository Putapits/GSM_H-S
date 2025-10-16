# PHPMailer OTP Setup Guide

Your OTP system has been successfully migrated from Brevo to PHPMailer.

## Configuration Steps

### 1. Configure SMTP Settings

Edit the file `config/phpmailer.php` with your SMTP credentials:

```php
return [
    'host' => 'smtp.gmail.com',          // Your SMTP server
    'port' => 587,                        // SMTP port
    'username' => 'your-email@gmail.com', // Your email
    'password' => 'your-app-password',    // Your password/app password
    'sender_email' => 'noreply@goserveph.gov',
    'sender_name' => 'GoServePH Services',
    'encryption' => 'tls',                // tls or ssl
];
```

### 2. Gmail Setup (Recommended for Testing)

If using Gmail, you need to create an **App Password**:

1. Go to your Google Account settings
2. Navigate to Security → 2-Step Verification (enable if not already)
3. Scroll down to "App passwords"
4. Generate a new app password for "Mail"
5. Use this 16-character password in your config file

**Important:** Use the app password, not your regular Gmail password!

### 3. Other SMTP Providers

#### Outlook/Hotmail
```php
'host' => 'smtp-mail.outlook.com',
'port' => 587,
'encryption' => 'tls',
```

#### Yahoo Mail
```php
'host' => 'smtp.mail.yahoo.com',
'port' => 587,
'encryption' => 'tls',
```

#### Mailtrap (for testing)
```php
'host' => 'smtp.mailtrap.io',
'port' => 2525,
'encryption' => 'tls',
```

### 4. Testing

1. Make sure your `config/phpmailer.php` file is properly configured
2. Try logging in with OTP at `login_otp.php`
3. Check your email for the OTP code
4. If emails aren't sending, check:
   - SMTP credentials are correct
   - Port is not blocked by firewall
   - Less secure app access is enabled (for Gmail)
   - Check PHP error logs for detailed error messages

## Files Changed

- ✅ **services/PHPMailerService.php** - New email service using PHPMailer
- ✅ **config/phpmailer.php** - SMTP configuration (gitignored)
- ✅ **config/phpmailer.example.php** - Example configuration template
- ✅ **api/auth.php** - Updated to use PHPMailer instead of Brevo
- ✅ **composer.json** - Removed Brevo, added PHPMailer
- ✅ **config/.gitignore** - Added phpmailer.php to protect credentials

## Troubleshooting

### Emails not sending?

1. **Check error logs**: Look in your PHP error log for PHPMailer errors
2. **Verify credentials**: Double-check username, password, host, and port
3. **Test SMTP connection**: Use telnet or online SMTP testers
4. **Firewall**: Ensure port 587 (or 465) is not blocked
5. **Gmail users**: Make sure you're using an App Password, not your regular password

### Common Errors

- **"SMTP connect() failed"**: Wrong host or port, or firewall blocking
- **"Invalid credentials"**: Wrong username/password
- **"Could not authenticate"**: For Gmail, you need an App Password

## Security Notes

- ✅ `config/phpmailer.php` is gitignored to protect your credentials
- ✅ Never commit your actual SMTP credentials to version control
- ✅ Use environment variables in production for better security
- ✅ The `.htaccess` file in `config/` prevents direct HTTP access to config files

## Need Help?

- PHPMailer Documentation: https://github.com/PHPMailer/PHPMailer
- Gmail App Passwords: https://support.google.com/accounts/answer/185833
