<?php
// config.php for Render PostgreSQL

// Database configuration using Render environment variables
define('DB_HOST', getenv('DB_HOST') ?: 'dpg-d4lv5va4d50c73eaibpg-a');
define('DB_NAME', getenv('DB_NAME') ?: 'cinema_booking_fyy6');
define('DB_USER', getenv('DB_USER') ?: 'cinema_booking_fyy6_user');
define('DB_PASS', getenv('DB_PASS') ?: 'u3MHDwnvyKzm60rRO1KhZ7QYUVxE0HoN');
define('DB_PORT', getenv('DB_PORT') ?: 5432);

// CORS headers for React frontend hosted on Netlify
header('Access-Control-Allow-Origin: https://booking-tk.netlify.app');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json; charset=utf-8');

// Handle preflight requests (CORS OPTIONS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
?>
