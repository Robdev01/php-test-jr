<?php
class Emprestimo
{
    private Livro $livro;
    private Usuario $usuario;
    private DateTime $dataEmprestimo;
    private ?DateTime $dataDevolucao;

    public function __construct(Livro $livro, Usuario $usuario)
    {
        $this->livro = $livro;
        $this->usuario = $usuario;
        $this->dataEmprestimo = new DateTime();
        $this->dataDevolucao = null;
    }

    public function devolver(): void
    {
        $this->dataDevolucao = new DateTime();
        $this->livro->devolver(); // Marca o livro como devolvido
    }

    public function getDataEmprestimo(): DateTime
    {
        return $this->dataEmprestimo;
    }

    public function getDataDevolucao(): ?DateTime
    {
        return $this->dataDevolucao;
    }
}
?>