# Système de création, modification et validation de tâches 

## Chapitre 1 : Introduction
Ce système permet à un utilisateur de créer des cartes de tâches, de les modifier et les supprimer. 
Pour ceci, j'ai utilisé : 
- du CRUD (Create Read Update Delete)
- une consultation d'interface dynamique
- un formulaire sécurisé de connexion ( pas d'enregistrement possible, création d'utilisateur via la page /insert )
- utilisation du SecurityBundle 

### Tout d'abord nous devons nous assurer que notre système est à jour.

| Outil  | Version minimale | Vérification rapide |
| ------------- | ------------- | ------------- |
| PHP CLI  | 8.3.x  | php -v → « PHP 8.3.* (cli) »  |
| Composer  | 2.7.x  | composer -V  |
| Node.js  | 20.x  | node -v  |
| Yarn (optionnel)  | ≥ 1.22  | yarn -v  |
| Symfony CLI  | 6.3+  | symfony -v  |
| Laragon  | 6.0 (Full)  | Menu Help ▸ About  |

Le projet s'appuie sur 
- Symfony 7.3.*
- Doctrine ORM
- Twig
- PHP Unit

### Installation du repository
1. Effectuer _git clone_ dans Git Bash, à l'endroit souhaité dans l'ordinateur 
2. Utilisation de _cd helpdesk_ pour se positionner dans le fichier racine
3. Utilisation de _composer install_ dans le terminal VSCode ( ou autre environnement de développement)


## Chapitre 2 : Création du projet pas à pas

### Installation du nouveau projet
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


### Création de l'entité
- Entrer la ligne de code _php bin/console make:entity_
Le wizard va nous demander plusieurs choses.
  - le nom de notre entité ( Ticket )
  - ses champs ( titre, description, priorité, statut, createdAt )

### Utilisation du SecurityBundle 
- Utiliser _composer require symfony/security-bundle_ dans le terminal
- Pour créer la BDD utilisateur _symfony console make:user_
- Pour la création du système d'authentification _symfony console make:auth_
- Pour créer l'utilisateur unique ( car nous n'avons pas de système de register )

```
    #[Route(path:"/insert", name:"home")]
    function index (EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response {
        $user = new User();
        $user->setEmail('test@test.fr')->setRoles([])->setPassword($hasher->hashPassword($user,'testtest'));
        $em->persist($user);
        $em->flush();
        return $this->render('home');
    }
```

- Effectuer une migration avec _php bin/console make:migrations_
Puis _php bin/console doctrine:migrations:migrate_

### Liaison des routes et des vues TWIG

### Styliser l'interface
Stylisation de l'interface grâce au CSS





















