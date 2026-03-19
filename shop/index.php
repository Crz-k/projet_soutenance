<?php
include 'includes/config.php';
include 'includes/functions.php';

if (isset($_GET['add'])) {
    $id = (int)$_GET['add'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}
?>


<h1>Catalogue</h1>

<?php foreach (getProducts($pdo) as $p): ?>
<div class="product">
    <h3><?= htmlspecialchars($p['name']) ?></h3>
    <p><?= htmlspecialchars($p['description']) ?></p>
    <strong><?= $p['price'] ?> €</strong>
    <br>
    <a href="?add=<?= $p['id'] ?>">Ajouter au panier</a>
</div>
<?php endforeach; ?>