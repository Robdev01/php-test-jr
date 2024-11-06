<?php
require_once 'app/database/Database.php';
require_once 'app/controllers/LivroController.php';
require_once 'app/controllers/UsuarioController.php';

$db = new BancoDeDados();
$livroController = new LivroController($db);
$usuarioController = new UsuarioController($db);

// Exemplo de uso
$livroController->adicionarLivro("O Senhor dos Anéis", "J.R.R. Tolkien", "978-85-363-2024-7");
$livroController->adicionarLivro("1984", "George Orwell", "978-85-363-2023-0");
$usuarioController->adicionarUsuario("João Silva", "Aluno");

// Listar livros
$livros = $livroController->listarLivros();
foreach ($livros as $livro) {
    echo "Título: " . $livro['titulo'] . " - Autor: " . $livro['autor'] . "<br>";
}

// Listar usuários
$usuarios = $usuarioController->listarUsuarios();
foreach ($usuarios as $usuario) {
    echo "Nome: " . $usuario['nome'] . " - Tipo: " . $usuario['tipo'] . "<br>";
}
