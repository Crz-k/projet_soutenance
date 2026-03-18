<?php
session_start();
require 'database.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $sql->execute([$email]);
    $user = $sql->fetch();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        header("Location: profile.php");
    } else {
        echo "Erreur de connexion";
    }
}
?>

<link rel="stylesheet" href="style.css">

<h2>Connexion</h2>

<form method="POST">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <button>Se connecter</button>
</form>