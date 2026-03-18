<?php
session_start();
require 'database.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $sql->execute([$username, $email, $password]);

    echo "Inscription réussie";
}
?>

<link rel="stylesheet" href="style.css">

<h2>Inscription</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Pseudo" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button>S'inscrire</button>
</form>