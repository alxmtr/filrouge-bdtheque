# Projet Fil Rouge - Bédéthèque PHP

Code d'un projet réalisé lors de ma formation de Développeur Logiciel à l'AFPA en 2016-2017, retrouvé au fond d'un disque dur.


### Description du projet

L'objectif de ce projet était de créer un site web pour cataloguer des bandes dessinées à partir d'une base de données existante (fichier dump SQL `BDTheque.sql`).

Maitrisant déjà PHP à l'époque et commençant à découvrir [Laravel](https://laravel.com), j'avais choisi de me lancer un peu plus dans le framework et de l'utiliser pour réaliser ce projet.


### Mise en page du site

Pour réaliser la mise en page je me suis tourné vers [Bulma](https://bulma.io), un framework CSS basé sur Flexbox. 

Bulma contient tous les élements dont j'avais besoin (boutons, menu, pagination...) et m'a permis de gagner du temps tout en réalisant une mise en page simple et moderne.


### Interface d'administration

Une interface était demandée pour ce projet et est disponible avec le chemin `/admin` dans l'URL.

Cette interface permet de gérer les BD et commentaires ainsi que d'ajouter des thèmes et des auteurs.

L'identifiant pour s'y connecter est `admin` et le mot de passe est `afpa`.


### Installation du projet

Ce projet utilise [Laravel](https://laravel.com) dans sa version **5.2** et requiert PHP version **5.5.9** ou supérieure, ainsi qu'un serveur MySQL.

- Cloner ce répertoire
    ```
    git clone https://github.com/alxmtr/filrouge-bdtheque.git
    cd filrouge-bdtheque
    ```

- Installer les dépendances avec [Composer](https://getcomposer.org)
    ```
    composer install
    ```
    
- Copier et éditer le fichier `.env` en y ajoutant vos identifiants de base de données

    ```
    cp .env.example .env
    ```
    
- Génerer une nouvelle clé application pour Laravel
    ```
    php artisan key:generate
    ```
    
- Lancer le serveur
    ```
    php artisan serve
    ```
    
Ne pas oublier d'executer le fichier SQL `BDTheque.sql` dans une base de données.
