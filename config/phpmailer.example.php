<?php
/**
 * PHPMailer Configuration Example
 * 
 * Copy this file to phpmailer.php and configure with your SMTP settings.
 * 
 * Common SMTP providers:
 * 
 * Gmail:
 *   - host: smtp.gmail.com
 *   - port: 587 (TLS) or 465 (SSL)
 *   - encryption: tls or ssl
 *   - username: your-email@gmail.com
 *   - password: your-app-password (not regular password, use App Password)
 *   - How to get App Password: https://support.google.com/accounts/answer/185833
 * 
 * Outlook/Hotmail:
 *   - host: smtp-mail.outlook.com
 *   - port: 587
 *   - encryption: tls
 *   - username: your-email@outlook.com
 *   - password: your-password
 * 
 * Yahoo:
 *   - host: smtp.mail.yahoo.com
 *   - port: 587 or 465
 *   - encryption: tls or ssl
 *   - username: your-email@yahoo.com
 *   - password: your-app-password
 * 
 * Mailtrap (for testing):
 *   - host: smtp.mailtrap.io
 *   - port: 2525
 *   - encryption: tls
 *   - username: your-mailtrap-username
 *   - password: your-mailtrap-password
 */

return [
    // SMTP server hostname
    'host' => 'smtp.gmail.com',
    
    // SMTP port (587 for TLS, 465 for SSL)
    'port' => 587,
    
    // SMTP username (usually your email address)
    'username' => 'your-email@gmail.com',
    
    // SMTP password (use App Password for Gmail)
    'password' => 'your-app-password',
    
    // Sender email address
    'sender_email' => 'noreply@goserveph.gov',
    
    // Sender name
    'sender_name' => 'GoServePH Services',
    
    // Encryption type: 'tls' or 'ssl'
    'encryption' => 'tls',
];
