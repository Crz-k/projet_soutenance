<?php require_once 'config/database.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main class="container">
    <section class="section">
        <h1>État de l'infrastructure</h1>

        <div class="cards">
            <?php
            $req = $pdo->query("SELECT * FROM services");

            while ($service = $req->fetch()) {
                $statutClass = strtolower(str_replace(' ', '-', $service['statut']));
            ?>
                <div class="card">
                    <h2><?= htmlspecialchars($service['nom_service']) ?></h2>
                    <p class="status <?= $statutClass ?>">
                        <?= htmlspecialchars($service['statut']) ?>
                    </p>
                    <p><?= htmlspecialchars($service['description']) ?></p>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>