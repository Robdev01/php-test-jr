<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController
{
    private BancoDeDados $db;

    public function __construct(BancoDeDados $db)
    {
        $this->db = $db;
    }

    public function adicionarUsuario(string $nome, string $tipo): void
    {
        $usuario = new Usuario($nome, $tipo);
        $this->db->saveUsuario($usuario);
    }

    public function listarUsuarios(): array
    {
        return $this->db->getUsuarios();
    }
}
?>