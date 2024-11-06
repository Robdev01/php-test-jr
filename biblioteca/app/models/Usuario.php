<?php
class Usuario
{
    private int $id;
    private string $nome;
    private string $tipo;

    public function __construct(string $nome, string $tipo)
    {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }
}
?>