<?php

function getVIPLevel($totalSpent) {
    if ($totalSpent >= 200) return "VIP++";
    if ($totalSpent >= 100) return "VIP+";
    if ($totalSpent >= 50) return "VIP";
    return "Joueur";
}

function getTotalSpent($pdo) {
    $stmt = $pdo->query("SELECT SUM(total) as total FROM orders");
    $result = $stmt->fetch();
    return $result['total'] ?? 0;
}