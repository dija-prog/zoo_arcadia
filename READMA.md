﻿# zoo_arcadia
un site web interactif avec le frontend et le backend pour la gestion des animaux, des habitats, des srvices de zoo  et des utilisateur dans le cadre du projet  (Evaluation en cours d'apprentissage ) Zoo Arcadia.

# A propos  
Zoo Arcadia est un platforme conçue pour simplifier la gestion de zoo, elle permet: 
- De gérer les information sur les animaux, leurs habitats et leur états. 
- de définir des rôles spécifiques sur les admininstrateurs, employés et vétérinaire.

# Foncionnalités 
- Authentification et gestion des utilisateurs (admin, employé,véterinaire) .
- gestion des utilisateur en CRUD .
- Gestion des animaux en CRUD. 
- Gestion de service en CRUD.
- Envoie d'emails : permet aux visiteurs de contacter les employés directement via un formulaire sécurisé.
- validation de l'avis pas l'employé.
- Sécurité :
  * Utilisation de mots de passe hachés pour protéger les comptes.
  * Gestion des rôles et des accés avec des seessions PHP pour une identification sécurisée.
  * Utilisation de PDO avec des requêtes préparées pour prévenir les injections SQL.

# Installation 
- installer git. 
- configurez l'environnement local avec xampp.
- clonez ce dépôt : git clone https://github.com/dija_prog/Zoo_arcadia.git
# utilisation 
- connectez-vous en tant qu'Adminstrateur pour gérer les utilisateurs, animaux, et habitats et services de zoo.   j'ai fais en sorte que personne peut créer un compte autant adminstrateur donc le username de l'admin est mot de passe vous le trouvrez dans le rapport.
- les employés peuvent ajouter et modifier la consomation de annimaux et l'état de les animaux.
- les vétérinaire peuvent commenter un habitat et ridége les rapports des animaux.

# Technologies 
- HTML,CSS,Bootstrap(frontend)
- php (Backend):
  -sessions pour la gestion des utilisateurs connectés.
  - Envoie d'email avec 'Symfony Mailer'
  - Validation des formualaires et gestion sécurisée des données
- Mysql (base de données )
- javascript (interaction dynamiques)
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






