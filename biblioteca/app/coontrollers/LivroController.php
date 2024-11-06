<?php
class LivroController
{
    private BancoDeDados $db;

    public function __construct(BancoDeDados $db)
    {
        $this->db = $db;
    }

    public function adicionarLivro(string $titulo, string $autor, string $isbn): void
    {
        $livro = new Livro($titulo, $autor, $isbn);
        $this->db->saveLivro($livro);
    }

    public function listarLivros(): array
    {
        return $this->db->getLivros();
    }
}
?>