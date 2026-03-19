<?php

function getProducts($pdo) {
    return $pdo->query("SELECT * FROM products")->fetchAll();
}

function getProduct($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getCartTotal($pdo) {
    $total = 0;
    foreach ($_SESSION['cart'] ?? [] as $id => $qty) {
        $product = getProduct($pdo, $id);
        $total += $product['price'] * $qty;
    }
    return $total;
}