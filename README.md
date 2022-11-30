# SYMFONY IPSSI

## Requirements

 - PHP 8.1 or higher
 - MySQL 5.7 or higher
 - composer 2.4 or higher
 - Node version 16 or higher

## Installation

### Clone

    git clone https://github.com/CDevJenny/symfony-ipssi.git

### Create env file

    cp .env .env.local
> Dans `.env.local` remplacer la ligne DATABASE avec vos informations de connexion.
### Install dependencies

    composer install

### Create DB
    symfony console doctrine:database:create
    symfony console doctrine:schema:update --force
## Front installation
    npm install
    npm run build
    npm run watch

## Run symfony server

### A executer une seule fois
    symfony server:ca: install
### A lancer à chaque fois 
    symfony server:start

## Dans le dossier SQL 
    Prendre le fichier .sql et importez le dans votre base de données
# Commandes utiles avec symfony console

## MakerBundle 
### Commandes make génériques
    symfony console make:entity
    symfony console make:form
    symfony console make:controller
    symfony console make:crud
### Commandes 
    symfony console make:user
    symfony console make:auth
    symfony console make:registration-form