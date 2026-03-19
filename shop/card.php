<?php
include 'includes/config.php';
include 'includes/functions.php';


if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
}
?>

<?php include 'includes/header.php'; ?>

<h1>Panier</h1>

<?php if (!empty($_SESSION['cart'])): ?>

<?php foreach ($_SESSION['cart'] as $id => $qty): 
    $p = getProduct($pdo, $id);
?>
<div>
    <?= $p['name'] ?> x <?= $qty ?>
    <a href="?remove=<?= $id ?>">❌</a>
</div>
<?php endforeach; ?>

<h3>Total : <?= getCartTotal($pdo) ?> €</h3>

<a href="checkout.php">Passer au paiement</a>

<?php else: ?>
<p>Panier vide</p>
<?php endif; ?>