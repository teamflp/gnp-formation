# SITE WEB: https://gnp-formation.com
# AUTEUR: GNP Formation

## Configuration de la base de données dans le fichier .env

```bash
symfony console doctrine:database:create # Création de la base de données
symfony console d:d:c # Forme abrégée de la commande symfony console doctrine:database:create
```

## Création de la première page HomeController

```bash
symfony console make:controller Home # Création du contrôleur
``` 

## Installation et configuration de la bibliothèque EasyAdmin

### Installation de la bibliothèque EasyAdmin
```bash
symfony composer req "admin:^4"
```
### Configuration de la bibliothèque EasyAdmin

```bash
symfony console make:admin:dashboard
symfony console m:a:d # Forme abrégée de la commande symfony console make:admin:dashboard
```

### Création des CRUD Controller

```bash
- symfony console make:admin:crud  
- symfony console m:a:c # Forme abrégée de la commande symfony console make:admin:crud
- symfony console make:admin:crud --entity=NomDeL'entité
```

# Création et migration des entités de la base de données

## Création de l'entité User et authentification

### Création de l'entité User
- User (nom, prenom, email, password, roles)
```bash
symfony console make:user # Création de l'entité User
```
### Création de l'authentification
```bash
symfony console make:auth # Création de l'authentification
```

## Création des entités
- Carousel (titre, sousTitre description, image, btnInfo, btnInscription)
- Services (titre, description, icon)
- About (titre, sousTitre, description, image)
- AboutCategory (category)

```bash
symfony console make:entity Nom-de-l-entité # Création d'une entité
```
### Migration des entités
```bash
symfony console doctrine:migrations # Création des migrations
symfony console doctrine:migrations:migrate # Exécution des migrations
symfony console d:m:m # Forme abrégée de la commande symfony console doctrine:migrations:migrate  
```

https://blog.remipetit.fr/comment-deployer-son-application-symfony-sur-lhebergeur-hostinger/