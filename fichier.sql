-- créer une table animal:

create table animal(
animal_id int auto_increment primary key,
animal_nom varchar(50) Not NULL,
habitat_id int, 
id_classe int,
constraint fk_habitat foreign key (habitat_id) REFERENCES habitat(habitat_id),
constraint fk_classe foreign key (id_classe) REFERENCES classe(id_classe)
);

-- créer une table habitat : 
create table habitat(
habitat_id int auto_increment primary key,
nom varchar(50) not NULL,
description varchar(50) not NULL
);

-- créer une table classe:
create table classe(
    id_classe int auto_increment primary key,
    nom_classe varchar(50) not NULL
);


create une table role (
    role_id int auto_increment primary key,
    nom_role varchar(50) not NULL
)

-- créer une table utilisateur :
create table utilisateur (
    username varchar(50) auto_increment primary key,
    password varchar(255) not NULL,
    nom varchar(50) not NULL,
    prenom varchar(50)not NULL,
    constraint fk_role foreign key (role_id)  REFERENCES role(role_id)
)
create une tbale avis (
    avis_id int auto_increment primary key,
    pseudo varchar(50) not NULL,
    commentaire varchar(50) not NULL,
    isValide BOOLEAN
)

create une table rapport_veterinaire (
    id_health int auto_increment primary key,
    etat  text ,
    detail text,
    animal_nom varchar(50) not NULL,
    quantite int,
    foodType varchar(50) not NULL,
    date date
)

create une table commentaire_habitat(
    comment_id int auto_increment primary key,
    commentaire text,
    commentaire_date date,
    constraint fk_habitat foreign key ( habitat_id)  REFERENCES habitat( habitat_id)
)

create une table contact (
    id_contact int auto_increment primary key,
    titre text,
    email varchar(50) not NULL,
    description text
)

create une table food (
    id_food int auto_increment primary key,
    animal_nom varchar(50) not NULL,
    foodType varchar(50) not NULL,
    quantite int,
    date date,
    heure time,
    constraint fk_animal foreign key ( animal_id)  REFERENCES animal( animal_id)
    
)

create une table service (
    service_id int auto_increment primary key,
    service_nom varchar(50) not NULL,
    description varchar(50) not NULL
)
    -- créer une de jointure entre la table animal et la table rapport_veterinaire et la table habitat et la table classe 

SELECT animal.animal_nom, rapport_veterinaire.*, habitat.*, classe.* 
FROM animal 
JOIN rapport_veterinaire 
ON animal.animal_nom = rapport_veterinaire.animal_nom 
JOIN habitat 
ON animal.habitat_id = habitat.habitat_id 
JOIN classe 
ON animal.id_classe = classe.id_classe

-- jointure entre table nimal habitat et table classe

SELECT animal.animal_nom, animal.animal_id, habitat.nom, classe.nom_classe 
FROM animal 
JOIN habitat 
ON animal.habitat_id = habitat.habitat_id 
JOIN classe 
ON classe.id_classe = animal.id_classe

