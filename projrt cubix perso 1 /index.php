<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Bienvenue sur Cubix</h1>

<?php if(isset($_SESSION['user_id'])): ?>
    <a href="profile.php">Mon profil</a>
    <a href="historique.php">Historique</a>
    <a href="logout.php">Déconnexion</a>
<?php else: ?>
    <a href="login.php">Connexion</a>
    <a href="register.php">Inscription</a>
<?php endif; ?>

</body>
</html>