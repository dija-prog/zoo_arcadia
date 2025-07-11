🐾 Zoo Arcadia

Zoo Arcadia est un site web interactif intégrant un frontend et un backend complet pour la gestion des animaux, des habitats, des services du zoo et des utilisateurs. Ce projet s'inscrit dans le cadre de l'évaluation en cours d'apprentissage.


📌 À propos

Zoo Arcadia est une plateforme conçue pour simplifier la gestion d’un zoo. Elle permet notamment :
De gérer les informations sur les animaux, leurs habitats et leur état de santé.
De définir des rôles spécifiques pour les administrateurs, employés et vétérinaires.
De suivre les vues et consultations du site grâce à l'intégration de MongoDB, utilisées pour les statistiques du dashboard administrateur.

⚙️ Fonctionnalités

Authentification et gestion des utilisateurs (admin, employé, vétérinaire).
* Gestion des utilisateurs en CRUD (Créer, Lire, Mettre à jour, Supprimer).
* Gestion des animaux en CRUD.
* Gestion des services en CRUD.
* Envoi d’e-mails : permet aux visiteurs de contacter les employés via un formulaire sécurisé.
* Validation des avis par les employés.
* Statistiques de vues sur le tableau de bord de l'administrateur (via MongoDB).

🔐 Sécurité

* Utilisation de mots de passe hachés pour protéger les comptes.
* Gestion des rôles et des accès via sessions PHP.
* Utilisation de PDO avec des requêtes préparées pour prévenir les injections SQL.

🧩 Installation

1. Prérequis
- Git
- XAMPP
- MongoDB (installé et lancé localement)
- PHP ≥ 7.4
- Composer (pour Symfony Mailer)

2. Étapes d’installation avec Git
- bash
- Copier
- Modifier

# Étape 1 : Cloner le projet
git clone https://github.com/dija_prog/Zoo_arcadia.git

# Étape 2 : Accéder au dossier du projet
cd Zoo_arcadia

# Étape 3 : Lancer XAMPP et démarrer Apache + MySQL

# Étape 4 : Importer la base de données MySQL via phpMyAdmin

# Étape 5 : Installer les dépendances de Symfony Mailer
composer install

# Étape 6 : Vérifier la connexion à MongoDB (localhost:27017)

# Étape 7 : Configurer le fichier .env si nécessaire (mail, MongoDB, etc.)

# Étape 8 : Accéder au projet depuis le navigateur
http://localhost/Zoo_arcadia

🧪 Utilisation

Connectez-vous en tant qu'administrateur pour gérer les utilisateurs, les animaux, les habitats et les services du zoo.
⚠️ Aucun utilisateur ne peut s’inscrire en tant qu’administrateur via le site.
👉 Les identifiants de l’administrateur, l'employeur et le vétéernaire sont :
    jose@zooarcadia.com  mdp: Jose_arcadia
    yanis@hotmail.com mdp:yanis@hotmail.com
    sara_sara@hotmail.fr mdp:sara_sara

Les employés peuvent :
* Ajouter et modifier la consommation des animaux.
* Mettre à jour l’état des animaux.
* Les vétérinaires peuvent :
* Commenter un habitat.
* Rédiger les rapports sur les animaux.

💻 Technologies utilisées

Frontend :

-HTML / CSS / Bootstrap
-JavaScript (interactions dynamiques)

Backend :

-PHP (sessions, logique serveur)
-MySQL (xampp) 
-MongoDB (statistiques des vues dans le dashboard admin)
-Symfony Mailer (envoi d'e-mails)
-PDO + requêtes préparées (sécurité SQL)
-Validation sécurisée des formulaires

# contributeurs
khadija ait hamou 
# licence

MIT License
Copyright (c) [2024] [dija-prog]
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.






