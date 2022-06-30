# RabbitMQ-test
Test avec RabbitMq
Symfony 5
PHP 8.0.3

### Formulaire sur la route : /addition

### Les fichiers installés :
- une Entity -> Calcul.php
- un Repository -> CalculRepository.php
- un Message -> AdditionNotification.php
- un Handler -> AdditionNotification.php
- une DB MySQL avec persist des valeurs du formulaire
- une vue twig addition->index.html.twig
- un formulaire qui comporte deux entrées avec un submit
- MESSENGER_TRANSPORT_DSN dans le bundle messenger.yaml
- Modification du .env

### docker-compose.yml :
- image: 'mysql:latest'
- image: rabbitmq:3.9-management

### description
Une class contient l'enveloppe du message: src/Message -> AdditionNotification.php
Elle est récupérée par un worker qui se chargera de mettre les messages en file d'attente : src/MessageHandler -> AdditionNotification.php
Le message est envoyé au broker RabbitMQ chargé de les consommer, pour les renvoyer ensuite à la vue.

- Necessite l'installation du module PHP "amqp"
- du "symfony composer req amqp-messenger"

## Ressources utiles

-blog martinfowler.com
https://martinfowler.com/eaaCatalog/dataTransferObject.html

- Exemple implémenation class DTO (Data Transfert Object)
https://kvashnin.github.io/blog/using-request-dto-in-symfony/

- La doc Symfony
https://symfony.com/doc/current/the-fast-track/fr/32-rabbitmq.html

- Comprendre le traitement asynchrones :
https://www.kaliop.com/fr/traitements-asynchrones-avec-symfony/

- Introduction to RabbitMQ and Symfony :
https://dev.to/fabiothiroki/introduction-to-rabbitmq-and-symfony-2an4

- Video/tuto YouTube :
Yoan Dev : https://yoandev.co/de-lasynchrone-avec-symfony-5-et-rabbitmq/


# Lancement de RabbitMQ

L'image de RabbitMQ a été imoprtée dans le docker-compose.yml
Il est exposé sur le port 5672 ou sera ouvert via le server Symfony [login:guest - pass:guest], aprés avoir lancé la commande :

```bash
docker-compose up -d
```

# La base de données MYSQL

L'image de MYSQL a été importée dans le docker-compose.yml

## Se connecter à la base de données

Dans le docker-compose.yml renommer la base de donnée en "addition" services->database->MYSQL_DATABASE:addition

Créez la base de données avec la commande :

```bash
php bin/console make:docker:database
```
- Choisir 0 pour MYSQL
- Nom du container : database

Lancez la commande :

```bash
docker-compose up -d
```

Créez les migrations avec la commande :

```bash
symfony console make:migration
```

Executez les migrations avec la commande :

```bash
symfony console doctrine:migrations:migrate
```

## Se connecter à la base de données :

Lancez la commande :

```bash
docker-compose exec database mysql -u root --password=password
```

Lancez la commande :

```bash
use main
```

Voir les tables :

```bash
SHOW TABLES;
```

Voir les données :

```bash
SELECT * FROM calcul;
```

## Sortir du container de la base de données

```bash
exit
```
