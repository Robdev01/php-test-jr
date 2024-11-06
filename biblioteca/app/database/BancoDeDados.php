<?php
class BancoDeDados
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = new PDO('sqlite:biblioteca.db'); // usandosqlife
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection(): PDO
    {
        return $this->conn;
    }

    public function initDb(): void
    {
        $this->conn->exec("CREATE TABLE IF NOT EXISTS livros (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            titulo TEXT NOT NULL,
            autor TEXT NOT NULL,
            isbn TEXT NOT NULL UNIQUE
        )");

        $this->conn->exec("CREATE TABLE IF NOT EXISTS usuarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            tipo TEXT NOT NULL
        )");
    }

    public function saveLivro(Livro $livro): void
    {
        $stmt = $this->conn->prepare("INSERT INTO livros (titulo, autor, isbn) VALUES (?, ?, ?)");
        $stmt->execute([$livro->getTitulo(), $livro->getAutor(), $livro->getIsbn()]);
    }

    public function saveUsuario(Usuario $usuario): void
    {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nome, tipo) VALUES (?, ?)");
        $stmt->execute([$usuario->getNome(), $usuario->getTipo()]);
    }

    public function getLivros(): array
    {
        $stmt = $this->conn->query("SELECT * FROM livros");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsuarios(): array
    {
        $stmt = $this->conn->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
