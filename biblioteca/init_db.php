<?php
// Include the database connection file
include_once 'app/database/Database.php';  
try {
    // Create a database connection instance
    $database = new Database();
    $conn = $database->getConnection();

    // Create tables
    $sql = "
        CREATE TABLE IF NOT EXISTS books (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            author TEXT NOT NULL,
            isbn TEXT NOT NULL UNIQUE,
            is_borrowed BOOLEAN DEFAULT 0
        );

        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            type TEXT NOT NULL  -- Changed from ENUM to TEXT
        );

        CREATE TABLE IF NOT EXISTS loans (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            book_id INTEGER NOT NULL,
            user_id INTEGER NOT NULL,
            loan_date DATE NOT NULL,
            return_date DATE,
            FOREIGN KEY (book_id) REFERENCES books(id),
            FOREIGN KEY (user_id) REFERENCES users(id)
        );
    ";

    // Execute the queries to create the tables
    $conn->exec($sql);
    echo "Database and tables created successfully.";
} catch (PDOException $exception) {
    echo "Error creating database or tables: " . $exception->getMessage();
}

?>
