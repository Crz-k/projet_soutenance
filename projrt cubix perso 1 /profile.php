<?php
session_start();
require 'database.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

$sql = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$sql->execute([$_SESSION['user_id']]);
$user = $sql->fetch();
?>

<link rel="stylesheet" href="style.css">

<h2>Profil</h2>

<p>Pseudo : <?php echo $user['username']; ?></p>
<p>Email : <?php echo $user['email']; ?></p>
<p>Niveau : <?php echo $user['level_user']; ?></p>
<p>Coins : <?php echo $user['coins']; ?></p>

<a href="historique.php">Voir historique</a>
<a href="logout.php">Déconnexion</a>