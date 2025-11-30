<?php
require_once 'config.php';

class Database {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $connectionString = sprintf(
                "host=%s port=%s dbname=%s user=%s password=%s",
                DB_HOST,
                DB_PORT,
                DB_NAME,
                DB_USER,
                DB_PASS
            );

            $this->conn = pg_connect($connectionString);

            if (!$this->conn) {
                throw new Exception("Database connection failed: " . pg_last_error());
            }

        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
            exit();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function close() {
        if ($this->conn) {
            pg_close($this->conn);
        }
    }
}

// Response helper functions
function sendResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data);
    exit();
}

function sendError($message, $statusCode = 400) {
    http_response_code($statusCode);
    echo json_encode(['error' => $message]);
    exit();
}
?>
