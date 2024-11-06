<?php
class Book
{
    private int $id;
    private string $title;
    private string $author;
    private string $isbn; // Value Object
    private bool $isBorrowed;

    public function __construct(string $title, string $author, string $isbn)
    {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->isBorrowed = false;
    }

    public function borrow(): void
    {
        if ($this->isBorrowed) {
            throw new Exception("Book is already borrowed.");
        }
        $this->isBorrowed = true;
    }

    public function returnBook(): void
    {
        $this->isBorrowed = false;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function isBorrowed(): bool
    {
        return $this->isBorrowed;
    }
}
?>
