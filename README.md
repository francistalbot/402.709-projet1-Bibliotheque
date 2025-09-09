# Projet de Bibliothèque

Ce projet est une application web de gestion de bibliothèque, permettant aux utilisateurs de consulter, ajouter, modifier et supprimer des livres.

## Fonctionnalités

-   Affichage de la liste des livres
-   Création, modification et suppression de livres
-   Création, modification et suppression de catégories
-   Création, modification et suppression de auteurs
-   Recherche de livres par titre ou auteur
-   Formulaire de contact et affichage des messages
-   Affichage des nouveautés, les 3 derniers livres ajoutés

## Technologies Utilisées

-   Laravel
-   Blade
-   Bootstrap
-   MySQL

## Installation

1. Installez les dépendances

    ```bash
    composer install
    npm install
    ```

2. Configurez votre fichier `.env`

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

3. Créez la base de données et exécutez les migrations

    ```bash
    php artisan migrate
    ```

4. Démarrez le serveur
    ```bash
    npm run dev
    php artisan serve
    ```

## Structure du Projet

-   `app/Models` : Contient les modèles pour les entités de la base de données (Livre, Auteur, Catégorie, Message).
-   `app/Http/Controllers` : Contient les contrôleurs pour gérer la logique métier et les interactions utilisateur.
-   `resources/views` : Contient les vues Blade pour le rendu HTML.
-   `routes/web.php` : Définit les routes de l'application.

## Auteurs

-   [Francis Talbot](https://github.com/francistalbot)
-   [Yamen Najeh](https://github.com/ennajehyamen)
