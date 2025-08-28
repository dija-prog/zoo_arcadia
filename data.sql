CREATE TABLE role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

CREATE TABLE utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES role(id_role)
);

CREATE TABLE habitat (
    id_habitat INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE animal (
    id_animal INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    race VARCHAR(100) NOT NULL,
    age INT,
    poids DECIMAL(6,2),
    etat VARCHAR(50),
    habitat_id INT NOT NULL,
    FOREIGN KEY (habitat_id) REFERENCES habitat(id_habitat)
);

CREATE TABLE rapport (
    id_rapport INT AUTO_INCREMENT PRIMARY KEY,
    contenu TEXT NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    utilisateur_id INT NOT NULL,
    animal_id INT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY (animal_id) REFERENCES animal(id_animal)
);
