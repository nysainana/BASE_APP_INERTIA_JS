# LE PETIT CINOCHE

## Presentation 
Une application web permettant de suivre l’état des ventes
de billets de manière transparente et organisée. L’application offrira des fonctionnalités
spécifiques pour différents types d’utilisateurs, permettant ainsi une gestion efficace du
processus de vente de billets.

## Pour demarrer
1. Cloner ce projet 
2. Créer un fichier `.env` à la racine de ce projet, à partir du fichier `.env.exemple`
3. Configurer votre base de données dans `.env`
4. Installer les dépendences : `composer install` puis `npm install`
5. Executer la migation de base de données: `php artisan migrate`
6. Demmarer les serveurs de dévéloppement **npm** et **php**, dans deux terminals differents: `php artisan serve` et `npm run dev`
7. Puis dans votre navigateur le lien qui apparait sur le terminal **php** dans votre navigateur (par defaut c'est: `http://127.0.0.1:8000`) 
