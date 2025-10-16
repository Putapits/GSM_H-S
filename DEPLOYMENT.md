# Deployment Guide - Health & Sanitation Management System

## Security Setup (IMPORTANT - Do This First!)

### 1. Create Environment Configuration

Copy the example environment file and configure your credentials:

```bash
cp config/.env.example config/.env
```

### 2. Configure Database Credentials

Edit `config/.env` and update the database settings:

```env
DB_HOST=localhost:3306
DB_USERNAME=your_database_user
DB_PASSWORD=your_secure_password
DB_NAME=capstone-hs
```

### 3. Configure Email/SMTP Settings

**IMPORTANT**: The exposed Gmail credentials in the code have been removed. You must:

1. Generate a NEW Gmail App Password (the old one `wlouwvjbzzjsljwn` should be revoked)
2. Update `config/.env` with your new credentials:

```env
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USERNAME=your-email@gmail.com
SMTP_PASSWORD=your-new-app-password
SMTP_FROM_EMAIL=your-email@gmail.com
SMTP_FROM_NAME=Health & Sanitation System
```

**How to generate Gmail App Password:**
1. Go to Google Account Settings
2. Security → 2-Step Verification (enable if not already)
3. App Passwords → Generate new password
4. Copy the 16-character password to `SMTP_PASSWORD` in `.env`

### 4. Set Application Environment

```env
APP_ENV=production
APP_DEBUG=false
```

## File Permissions

Ensure proper permissions on sensitive files:

```bash
chmod 600 config/.env
chmod 755 config/
```

## What's Protected Now

✅ **Database credentials** - Now loaded from `config/.env`
✅ **SMTP/Email credentials** - Now loaded from `config/.env`
✅ **Environment variables** - Excluded from Git via `.gitignore`

## Deployment Checklist

- [ ] Copy `config/.env.example` to `config/.env`
- [ ] Update all credentials in `config/.env`
- [ ] **Revoke the old exposed Gmail app password**
- [ ] Generate and configure new Gmail app password
- [ ] Set `APP_ENV=production` and `APP_DEBUG=false`
- [ ] Verify `config/.env` is NOT committed to Git
- [ ] Test database connection
- [ ] Test email/OTP functionality
- [ ] Review and rotate any other exposed credentials

## Security Notes

⚠️ **CRITICAL**: The following credentials were exposed in your code history:
- Gmail: `santos.peterjames.divinagracia@gmail.com`
- App Password: `wlouwvjbzzjsljwn`

**Action Required**: 
1. Revoke the exposed app password immediately
2. Generate a new one and update `config/.env`
3. Consider cleaning Git history if already pushed to a public repository

## Production Server Setup

For production deployment:

1. Use environment variables on the server instead of `.env` file
2. Set variables in Apache/Nginx configuration or hosting control panel
3. Never commit `config/.env` to version control
4. Use HTTPS for all production traffic
5. Enable PHP error logging (not display) in production

## Support

If you need help with deployment, refer to:
- `config/.env.example` for configuration template
- `config/config.php` for how environment variables are loaded
- `PHPMAILER_SETUP.md` for email configuration details
