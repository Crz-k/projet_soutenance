<?php
include 'includes/config.php';
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $total = getCartTotal($pdo);

    $stmt = $pdo->prepare("INSERT INTO orders(total) VALUES(?)");
    $stmt->execute([$total]);
    $orderId = $pdo->lastInsertId();

    foreach ($_SESSION['cart'] as $id => $qty) {
        $stmt = $pdo->prepare("INSERT INTO order_items(order_id, product_id, quantity) VALUES(?,?,?)");
        $stmt->execute([$orderId, $id, $qty]);
    }

    $_SESSION['cart'] = [];
    header("Location: success.php");
}
?>

<?php include 'includes/header.php'; ?>

<h1>Paiement</h1>

<form method="POST">
    <input type="text" placeholder="Nom" required><br>
    <input type="email" placeholder="Email" required><br>
    <button type="submit">Payer</button>
</form>