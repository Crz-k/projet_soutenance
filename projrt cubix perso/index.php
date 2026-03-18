<?php require_once 'config/database.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main class="container">
    <section class="hero">
        <div class="hero-overlay">
            <h1>Bienvenue sur Tyrolium</h1>
            <p>Le portail officiel de notre serveur Minecraft communautaire.</p>
            <a href="actualites.php" class="hero-btn">Voir les actualités</a>
        </div>
    </section>

    <section class="section">
        <h2>Dernières actualités</h2>

        <div class="cards">
            <?php
            $reqNews = $pdo->query("SELECT * FROM actualites ORDER BY date_publication DESC LIMIT 3");

            while ($news = $reqNews->fetch()) {
            ?>
                <article class="card">
                    <h3><?= htmlspecialchars($news['titre']) ?></h3>
                    <p><?= htmlspecialchars($news['contenu']) ?></p>
                    <small>
                        Par <?= htmlspecialchars($news['auteur']) ?> -
                        <?= htmlspecialchars($news['date_publication']) ?>
                    </small>
                </article>
            <?php
            }
            ?>
        </div>
    </section>

    <section class="section">
        <h2>Top 5 joueurs</h2>

        <table>
            <thead>
                <tr>
                    <th>Rang</th>
                    <th>Pseudo</th>
                    <th>Niveau</th>
                    <th>Temps de jeu</th>
                    <th>Argent</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $reqClassement = $pdo->query("SELECT * FROM classement ORDER BY rang_joueur ASC LIMIT 5");

                while ($joueur = $reqClassement->fetch()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($joueur['rang_joueur']) . "</td>";
                    echo "<td>" . htmlspecialchars($joueur['pseudo']) . "</td>";
                    echo "<td>" . htmlspecialchars($joueur['niveau']) . "</td>";
                    echo "<td>" . htmlspecialchars($joueur['temps_jeu']) . " h</td>";
                    echo "<td>" . htmlspecialchars($joueur['argent']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section class="section">
        <h2>État des services</h2>

        <div class="cards">
            <?php
            $reqServices = $pdo->query("SELECT * FROM services");

            while ($service = $reqServices->fetch()) {
                $statutClass = strtolower(str_replace(' ', '-', $service['statut']));
            ?>
                <div class="card">
                    <h3><?= htmlspecialchars($service['nom_service']) ?></h3>
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