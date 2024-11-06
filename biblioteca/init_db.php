<?php
// Inclui o arquivo de conexão com o banco de dados
include_once 'app/database/BancoDeDados.php';  // Caminho correto para o arquivo Database.php

try {
    // Cria uma instância de conexão com o banco de dados
    $database = new BancoDeDados();
    $conn = $database->getConnection();

    // Criação das tabelas
    $sql = "
        CREATE TABLE IF NOT EXISTS livros (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            titulo TEXT NOT NULL,
            autor TEXT NOT NULL,
            isbn TEXT NOT NULL UNIQUE,
            esta_emprestado BOOLEAN DEFAULT 0
        );

        CREATE TABLE IF NOT EXISTS usuarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            tipo TEXT NOT NULL  -- Mudado de ENUM para TEXT
        );

        CREATE TABLE IF NOT EXISTS emprestimos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            livro_id INTEGER NOT NULL,
            usuario_id INTEGER NOT NULL,
            data_emprestimo DATE NOT NULL,
            data_devolucao DATE,
            FOREIGN KEY (livro_id) REFERENCES livros(id),
            FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
        );
    ";

    // Executa as queries para criar as tabelas
    $conn->exec($sql);
    echo "Banco de dados e tabelas criados com sucesso.";
} catch (PDOException $exception) {
    echo "Erro ao criar o banco de dados ou as tabelas: " . $exception->getMessage();
}

?>
