<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing API...\n\n";

// Test 1: Check if database.php loads
echo "1. Loading database.php...\n";
try {
    require_once __DIR__ . '/include/database.php';
    echo "✓ Database loaded successfully\n\n";
} catch (Exception $e) {
    echo "✗ Error loading database: " . $e->getMessage() . "\n\n";
    exit;
}

// Test 2: Check if PHPMailer service loads
echo "2. Loading PHPMailer service...\n";
try {
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/services/PHPMailerService.php';
    echo "✓ PHPMailer service loaded successfully\n\n";
} catch (Exception $e) {
    echo "✗ Error loading PHPMailer: " . $e->getMessage() . "\n\n";
    exit;
}

// Test 3: Check if config exists
echo "3. Checking PHPMailer config...\n";
if (file_exists(__DIR__ . '/config/phpmailer.php')) {
    echo "✓ Config file exists\n";
    try {
        $config = require __DIR__ . '/config/phpmailer.php';
        echo "✓ Config loaded successfully\n";
        echo "   Host: " . ($config['host'] ?? 'NOT SET') . "\n";
        echo "   Port: " . ($config['port'] ?? 'NOT SET') . "\n";
        echo "   Username: " . ($config['username'] ?? 'NOT SET') . "\n\n";
    } catch (Exception $e) {
        echo "✗ Error loading config: " . $e->getMessage() . "\n\n";
    }
} else {
    echo "✗ Config file does not exist\n\n";
}

// Test 4: Try to initialize PHPMailer service
echo "4. Initializing PHPMailer service...\n";
try {
    $mailer = \App\Services\PHPMailerService::fromConfig();
    echo "✓ PHPMailer service initialized successfully\n\n";
} catch (Exception $e) {
    echo "✗ Error initializing PHPMailer: " . $e->getMessage() . "\n\n";
}

echo "All tests completed!\n";
