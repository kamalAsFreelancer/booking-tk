<?php
require_once 'Database.php';

// Create database connection
$db = new Database();
$conn = $db->getConnection();

// Fetch movies from PostgreSQL
$query = "SELECT id, title, description, poster, duration, language, genre, price FROM movies ORDER BY id DESC";
$result = pg_query($conn, $query);

if (!$result) {
    sendError("Failed to fetch movies: " . pg_last_error($conn), 500);
}

$movies = [];
while ($row = pg_fetch_assoc($result)) {
    $movies[] = [
        'id' => (int)$row['id'],
        'title' => $row['title'],
        'description' => $row['description'],
        'poster' => $row['poster'],
        'duration' => (int)$row['duration'],
        'language' => $row['language'],
        'genre' => $row['genre'],
        'price' => isset($row['price']) ? (float)$row['price'] : null
    ];
}

sendResponse(['movies' => $movies]);
$db->close();
?>
