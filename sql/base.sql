CREATE DATABASE IF NOT EXISTS tyrolium CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE tyrolium;

CREATE TABLE actualites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    auteur VARCHAR(100) NOT NULL,
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE classement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100) NOT NULL,
    niveau INT NOT NULL,
    temps_jeu INT NOT NULL,
    argent INT NOT NULL,
    rang_joueur INT NOT NULL
);

CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_service VARCHAR(100) NOT NULL,
    statut VARCHAR(30) NOT NULL,
    description VARCHAR(255) NOT NULL
);

INSERT INTO actualites (titre, contenu, auteur) VALUES
('Ouverture de la saison 2', 'La nouvelle saison ouvre ce week-end avec une nouvelle map, de nouveaux événements et des récompenses exclusives.', 'Admin'),
('Tournoi PvP communautaire', 'Un tournoi PvP aura lieu dimanche à 18h. Les meilleurs joueurs recevront des récompenses en jeu.', 'Maxime'),
('Nouvelle boutique disponible', 'De nouveaux grades VIP, cosmétiques et packs ont été ajoutés dans la boutique.', 'Staff');

INSERT INTO classement (pseudo, niveau, temps_jeu, argent, rang_joueur) VALUES
('Alex', 25, 120, 5400, 1),
('Nox', 22, 110, 5000, 2),
('Lina', 20, 95, 4600, 3),
('Yass', 18, 80, 3900, 4),
('Milo', 17, 72, 3500, 5);

INSERT INTO services (nom_service, statut, description) VALUES
('Serveur Minecraft', 'En ligne', 'Le serveur principal est accessible aux joueurs.'),
('Serveur vocal', 'En ligne', 'Le vocal communautaire fonctionne correctement.'),
('Boutique', 'Maintenance', 'Une mise à jour de la boutique est en cours.');