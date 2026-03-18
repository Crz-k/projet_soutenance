<?php
session_start();
require 'database.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

$sql = $pdo->prepare("SELECT * FROM historiques WHERE user_id = ? ORDER BY action_date DESC");
$sql->execute([$_SESSION['user_id']]);
$actions = $sql->fetchAll();
?>

<link rel="stylesheet" href="style.css">

<h2>Historique</h2>

<?php foreach($actions as $action): ?>
    <p><?php echo $action['action_text']; ?> - <?php echo $action['action_date']; ?></p>
<?php endforeach; ?>

<a href="profile.php">Retour</a>