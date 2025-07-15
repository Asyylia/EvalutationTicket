#Système de création, modification et validation de tâches 

##Tout d'abord nous devons nous assurer que notre système est à jour.

| Outil  | Version minimale | Vérification rapide |
| ------------- | ------------- | ------------- |
| PHP CLI  | 8.3.x  | php -v → « PHP 8.3.* (cli) »  |
| Composer  | 2.7.x  | composer -V  |
| Node.js  | 20.x  | node -v  |
| Yarn (optionnel)  | ≥ 1.22  | yarn -v  |
| Symfony CLI  | 6.3+  | symfony -v  |
| Laragon  | 6.0 (Full)  | Menu Help ▸ About  |

##Installation du nouveau projet
- Ouvrir VisualStudioCode
- Se positionner à l'endroit souhaité dans l'ordinateur ( ici, C:/laragon/www)
- Dans le terminal VScode, entrer : symfony new monprojet --webapp
- Une fois le projet crée, se positionner à la racine
- Entrer _composer install_
- Entrer _npm install_ ou _yarn install_
- Entrer _npm run build_ ou _yarn build_
- Créer la base de données dans laragon, soit avec le logiciel, soit avec cette commande dans le terminal _php bin/console doctrine:database:create --if-not-exists_ puis _php bin/console doctrine:migrations:migrate_
- Dans le fichier .env, modifier la ligne correspondant à notre base de données : _DATABASE_URL="mysql://root:@127.0.0.1:3306/NOMDEMABASE?serverVersion=10.4"_
- Lancer le serveur afin de visualiser notre site _symfony server:start -d_


##Création de l'entité
- Entrer la ligne de code _php bin/console make:entity_
Le wizard va nous demander plusieurs choses.
  - le nom de notre entité ( Ticket )
  - ses champs ( titre, description, priorité, statut, createdAt )
- Effectuer une migration avec _php bin/console make:migrations_
Puis _php bin/console doctrine:migrations:migrate_






















