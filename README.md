# V-Parrot, site d'un garagiste

## LE PROJET Garage automobile
Vincent Parrot, fort de ses 15 années d'expérience dans la réparation automobile, a ouvert son propre garage à Toulouse en 2021. Depuis 2 ans, il propose une large gamme de services: réparation de la carrosserie et de la mécanique des voitures ainsi que leur entretien régulier pour garantir leur performance et leur sécurité. De plus, le Garage V. Parrot met en vente des véhicules d'occasion afin d'accroître son chiffre d'affaires. Vincent Parrot considère son atelier comme un véritable lieu de confiance pour ses clients et leurs voitures doivent, selon lui, à tout prix être entre de bonnes mains. Bien qu'il fournisse grâce à ses employés un service de qualité et personnalisé à chaque client, Vincent Parrot reconnaît qu'il doit être visible sur internet s'il veut se faire définitivement une place parmi la concurrence. 

### Fonctionnalités désirées
###### Se connecter
###### Présenter les services
###### Définir les horaires d’ouverture
###### Exposer les voitures d'occasion
###### Filtrer la liste des véhicules d’occasion
###### Permettre de contacter l'atelier
###### Recueillir les témoignages des clients

## Pré-requis
PHP (version 7.4 ou supérieure)
Composer (pour gérer les dépendances PHP)
Symfony CLI (recommandé pour une meilleure expérience de développement)
Un serveur de base de données compatible (MySQL, PostgreSQL, SQLite, etc.)

## Installation
#### 1.Clonez ce dépôt Git sur votre machine locale en utilisant la commande suivante :
*git clone https://github.com/Faizh33/v-parrot*
#### 2.Accédez au répertoire du projet :
*cd mon-projet-symfony*
#### 3.Installez les dépendances du projet à l'aide de Composer :
*composer install*
#### 4.Créez le fichier `.env` à la racine du projet et configurez les variables d'environnement nécessaires pour votre environnement de développement.
#### 5.Créez la base de données et appliquez les migrations:
Les données sont disponibles en mySQL dans le dossiers annexes
/!\ Les mots de passe doivent être insérés dans le code MySQL, au niveau du INSERT INTO de la table User.
*php bin/console doctrine:database:create*
*php bin/console doctrine:migrations:migrate*
#### 6.Démarrez le serveur de développement Symfony :
*symfony server:start*
Le serveur de développement démarre généralement sur `http://localhost:8000`. Vous pouvez accéder à l'application en ouvrant cette URL dans votre navigateur web.

## Création d'un administrateur
#### 1.Générer un UUID sur un site de génération d'UUID
#### 2.Choisir un mot de passe et utiliser la fonction (password_hash('votre mot de passe', PASSWORD_BCRYPT)) et récupérer le hash du mot de passe.
#### 3.Entrer l'administrateur en base de données.
*INSERT INTO user VALUES('uuid', 'email', 'password', 'firstName', 'lastName', '["ROLE_ADMIN"]');*

## Documentation
Consultez la documentation de Symfony pour en savoir plus sur la création et la gestion de projets Symfony :
*[Documentation Symfony](https://symfony.com/doc/current/index.html)*

## Problèmes et Support
Si vous rencontrez des problèmes ou avez des questions, n'hésitez pas à ouvrir un ticket (issue) sur ce dépôt. Je serais ravie de vous aider !







