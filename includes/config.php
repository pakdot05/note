<?php

// Fetch environment variables with fallback values
$host = getenv('DB_HOST') ?: '127.0.0.1'; 
$user = getenv('DB_USERNAME') ?: 'root';  
$pass = getenv('DB_PASSWORD') ?: '';      
$dbname = getenv('DB_DATABASE') ?: 'my_database';  
$port = getenv('DB_PORT') ?: '3306';   

// PDO Connection Setup
try {
    // Create a new PDO instance
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions for error handling
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Set default fetch mode
        PDO::ATTR_PERSISTENT => false, // Disable persistent connections for simplicity
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    ];

    $dbh = new PDO($dsn, $user, $pass, $options);

    // Success Message (for debugging purposes)
    echo "Database connection successful!";
} catch (PDOException $e) {
    // Error handling, with detailed error message
    http_response_code(500);
    exit("Database connection failed: " . $e->getMessage());
}

?>
