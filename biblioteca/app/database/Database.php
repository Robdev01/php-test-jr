<?php
class Database
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = new PDO('sqlite:library.db'); // using sqlite
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection(): PDO
    {
        return $this->conn;
    }

    public function initDb(): void
    {
        $this->conn->exec("CREATE TABLE IF NOT EXISTS books (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            author TEXT NOT NULL,
            isbn TEXT NOT NULL UNIQUE
        )");

        $this->conn->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            type TEXT NOT NULL
        )");
    }

    public function saveBook(Book $book): void
    {
        $stmt = $this->conn->prepare("INSERT INTO books (title, author, isbn) VALUES (?, ?, ?)");
        $stmt->execute([$book->getTitle(), $book->getAuthor(), $book->getIsbn()]);
    }

    public function saveUser(User $user): void
    {
        $stmt = $this->conn->prepare("INSERT INTO users (name, type) VALUES (?, ?)");
        $stmt->execute([$user->getName(), $user->getType()]);
    }

    public function getBooks(): array
    {
        $stmt = $this->conn->query("SELECT * FROM books");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsers(): array
    {
        $stmt = $this->conn->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
