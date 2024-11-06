<?php
require_once 'app/database/Database.php';
require_once 'app/controllers/BookController.php';
require_once 'app/controllers/UserController.php';

// Rest of the code
$db = new Database();
$bookController = new BookController($db);
$userController = new UserController($db);

// Add books
$bookController->addBook("The Lord of the Rings - The Fellowship of the Ring", "J.R.R. Tolkien", "978-85-363-2024-7");
$bookController->addBook("1984", "George Orwell", "978-85-363-2023-0");
$bookController->addBook("Don Quixote", "Miguel de Cervantes", "978-85-363-2022-3");
$bookController->addBook("The Moreninha", "Joaquim Manuel de Macedo", "978-85-363-2021-6");
$bookController->addBook("The Little Prince", "Antoine de Saint-Exupéry", "978-85-363-2020-9");
$bookController->addBook("Harry Potter and the Philosopher's Stone", "J.K. Rowling", "978-85-363-2019-3");
$bookController->addBook("The Cave", "José Saramago", "978-85-363-2018-6");
$bookController->addBook("The Da Vinci Code", "Dan Brown", "978-85-363-2017-9");
$bookController->addBook("The Hobbit", "J.R.R. Tolkien", "978-85-363-2016-2");
$bookController->addBook("The Divine Comedy", "Dante Alighieri", "978-85-363-2015-5");

// Add users
$userController->addUser("John Silva", "Student");
$userController->addUser("Mary Oliveira", "Teacher");
$userController->addUser("Carlos Souza", "Student");
$userController->addUser("Ana Costa", "Teacher");
$userController->addUser("Pedro Lima", "Student");
$userController->addUser("Juliana Mendes", "Teacher");
$userController->addUser("Ricardo Alves", "Student");
$userController->addUser("Fernanda Santos", "Teacher");
$userController->addUser("Lucas Pereira", "Student");
$userController->addUser("Patricia Rocha", "Teacher");

// List books
$books = $bookController->listBooks();
foreach ($books as $book) {
    echo "Title: " . $book['title'] . " - Author: " . $book['author'] . "<br>";
}

// List users
$users = $userController->listUsers();
foreach ($users as $user) {
    echo "Name: " . $user['name'] . " - Type: " . $user['type'] . "<br>";
}
?>
