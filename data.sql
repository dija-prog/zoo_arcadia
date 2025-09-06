-- Création de la base
CREATE DATABASE IF NOT EXISTS zoo_arcadia;
USE zoo_arcadia;


-- Table : service

CREATE TABLE service (
    service_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    service_nom VARCHAR(50),
    description VARCHAR(50)
);


-- Table : avis

CREATE TABLE avis (
    avis_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50),
    commentaire VARCHAR(50),
    isValide TINYINT(1)
);


-- Table : contact

CREATE TABLE contact (
    id_contact INT(11) AUTO_INCREMENT PRIMARY KEY,
    titre TEXT,
    email VARCHAR(150),
    description TEXT
);


-- Table : classe

CREATE TABLE classe (
    id_classe INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom_classe VARCHAR(50)
);


-- Table : habitat

CREATE TABLE habitat (
    habitat_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    description TEXT
);


-- Table : commentaires_habitats

CREATE TABLE commentaires_habitats (
    comment_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    habitat_id INT(11),
    commentaire TEXT,
    date_commentaire DATE,
    FOREIGN KEY (habitat_id) REFERENCES habitat(habitat_id)
);


-- Table : role

CREATE TABLE role (
    role_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom_role VARCHAR(50)
);


-- Table : utilisateur

CREATE TABLE utilisateur (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255),
    nom VARCHAR(50),
    prenom VARCHAR(50),
    role_id INT(11) UNSIGNED,
    reset_token VARCHAR(255),
    reset_token_expire DATETIME,
    FOREIGN KEY (role_id) REFERENCES role(role_id)
);


-- Table : animal

CREATE TABLE animal (
    animal_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    animal_nom VARCHAR(50),
    id_classe INT(11),
    habitat_id INT(11),
    image VARCHAR(255),
    FOREIGN KEY (id_classe) REFERENCES classe(id_classe),
    FOREIGN KEY (habitat_id) REFERENCES habitat(habitat_id)
);


-- Table : food

CREATE TABLE food (
    id_food INT(11) AUTO_INCREMENT PRIMARY KEY,
    animal_nom VARCHAR(50),
    foodType VARCHAR(50),
    quantite INT(11),
    Date DATE,
    Heure TIME,
    animal_id INT(11),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id)
);


-- Table : rapport_veterinaire

CREATE TABLE rapport_veterinaire (
    id_health INT(11) AUTO_INCREMENT PRIMARY KEY,
    etat TEXT,
    detail TEXT,
    animal_id INT(11),
    quantite INT(11),
    foodType VARCHAR(50),
    date DATE,
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id)
);


-- Données de test

-- Table : service
INSERT INTO service (service_nom, description) VALUES
('Visite guidée', 'Tour complet du zoo avec guide'),
('Restauration', 'Restaurant bio pour visiteurs'),
('Boutique', 'Souvenirs et cadeaux');

-- Table : avis
INSERT INTO avis (pseudo, commentaire, isValide) VALUES
('Lila75', 'Super zoo, très propre', 1),
('TomD', 'Un peu trop de monde', 1),
('NinaZoo', 'Manque de panneaux explicatifs', 0);

-- Table : contact
INSERT INTO contact (titre, email, description) VALUES
('Demande info', 'info@zooarcadia.com', 'Quels sont vos horaires ?'),
('Réservation', 'resa@zooarcadia.com', 'Peut-on réserver en ligne ?');

-- Table : classe
INSERT INTO classe (nom_classe) VALUES
('Mammifères'),
('Oiseaux'),
('Reptiles');

-- Table : habitat
INSERT INTO habitat (nom, description) VALUES
('Savane', 'Habitat pour lions, girafes et zèbres'),
('Jungle', 'Habitat tropical pour singes et oiseaux exotiques'),
('Marécage', 'Habitat humide pour crocodiles et amphibiens');

-- Table : commentaires_habitats
INSERT INTO commentaires_habitats (habitat_id, commentaire, date_commentaire) VALUES
(1, 'Très réaliste et bien entretenu', '2025-09-01'),
(2, 'Super ambiance !', '2025-09-02');

-- Table : role
INSERT INTO role (nom_role) VALUES
('Administrateur'),
('Vétérinaire'),
('Employé'),
('Visiteur');

-- Table : utilisateur
INSERT INTO utilisateur (username, password, nom, prenom, role_id, reset_token, reset_token_expire) VALUES
('admin', 'pass123', 'Martin', 'Paul', 1, NULL, NULL),
('vet01', 'vetpass', 'Dupont', 'Claire', 2, NULL, NULL),
('emp1', 'zooemp', 'Durand', 'Luc', 3, NULL, NULL),
('visiteur1', 'azerty', 'Petit', 'Sophie', 4, NULL, NULL);

-- Table : animal
INSERT INTO animal (animal_nom, id_classe, habitat_id, image) VALUES
('Lion', 1, 1, 'lion.jpg'),
('Girafe', 1, 1, 'girafe.jpg'),
('Perroquet', 2, 2, 'perroquet.jpg'),
('Crocodile', 3, 3, 'crocodile.jpg');

-- Table : food
INSERT INTO food (animal_nom, foodType, quantite, Date, Heure, animal_id) VALUES
('Lion', 'Viande', 5, '2025-09-01', '12:30:00', 1),
('Girafe', 'Feuilles', 10, '2025-09-01', '14:00:00', 2),
('Perroquet', 'Graines', 2, '2025-09-02', '09:15:00', 3);

-- Table : rapport_veterinaire
INSERT INTO rapport_veterinaire (etat, detail, animal_id, quantite, foodType, date) VALUES
('Bonne santé', 'RAS', 1, 5, 'Viande', '2025-09-01'),
('Petite blessure', 'Soins à la patte', 2, 10, 'Feuilles', '2025-09-02'),
('Surveillance', 'Bec abîmé', 3, 2, 'Graines', '2025-09-02');

