<?php

// insert query for registration
function insertUser($conn, $id, $fullname , $username, $email, $phone, $password, $secretAnswer)
{
    $sql = "INSERT INTO user (id, fullname, username, email, ph_number, password, secret_answer) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$id, $fullname, $username, $email, $phone, $password, $secretAnswer]);
}

// select query for username
function selectUser($conn, $username)
{
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetch();
}

// select query for email
function selectUserEmail($conn, $email)
{
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch();
}

// update query for password

function updatePassword($conn, $id, $password)
{
    $sql = "UPDATE user SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$password, $id]);
    return $stmt->rowCount();
}



// select all books

function selectAllBooks($conn)
{
    $sql = "SELECT * FROM books";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// select book by id

function selectBook($conn, $id)
{
    $sql = "SELECT * FROM books WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// update book

function updateBook($conn, $id, $title, $author, $description, $rating)
{
    $sql = "UPDATE books SET title = ?, author = ?, description = ?, rating = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $author, $description, $rating, $id]);
    return $stmt->rowCount();
}

// delete book

function deleteBook($conn, $id)
{
    $sql = "DELETE FROM books WHERE id = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$id]);
}



// add book
function insertBook($conn, $id, $title, $author, $description, $rating, $image)
{
    $sql = "INSERT INTO books (id, title, author, description, rating, cover) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$id, $title, $author, $description, $rating, $image]);
}