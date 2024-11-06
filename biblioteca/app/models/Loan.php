<?php
class Loan
{
    private Book $book;
    private User $user;
    private DateTime $loanDate;
    private ?DateTime $returnDate;

    public function __construct(Book $book, User $user)
    {
        $this->book = $book;
        $this->user = $user;
        $this->loanDate = new DateTime();
        $this->returnDate = null;
    }

    public function returnBook(): void
    {
        $this->returnDate = new DateTime();
        $this->book->returnBook(); // Marks the book as returned
    }

    public function getLoanDate(): DateTime
    {
        return $this->loanDate;
    }

    public function getReturnDate(): ?DateTime
    {
        return $this->returnDate;
    }
}
?>
