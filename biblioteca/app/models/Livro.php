<?php
class Livro
{
    private int $id;
    private string $titulo;
    private string $autor;
    private string $isbn; // Value Object
    private bool $estaEmprestado;

    public function __construct(string $titulo, string $autor, string $isbn)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->isbn = $isbn;
        $this->estaEmprestado = false;
    }

    public function emprestar(): void
    {
        if ($this->estaEmprestado) {
            throw new Exception("Livro já está emprestado.");
        }
        $this->estaEmprestado = true;
    }

    public function devolver(): void
    {
        $this->estaEmprestado = false;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function isEmprestado(): bool
    {
        return $this->estaEmprestado;
    }
}
?>