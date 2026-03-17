<?php require_once 'config/database.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main class="container">
    <section class="section">
        <h1>Classement des joueurs</h1>

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
                $req = $pdo->query("SELECT * FROM classement ORDER BY rang_joueur ASC");

                while ($joueur = $req->fetch()) {
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
</main>

<?php include 'includes/footer.php'; ?>