# RabbitMQ-test
Test avec RabbitMq

# Lancement de RabbitMQ

L'image de RabbitMQ a été imoprtée dans le docker-compose.yml
Il est exposé sur le port 5672 ou sera ouvert via le server Symfony, aprés avoir lancé la commande :

```bash
docker-compose up -d
```

# La base de données MYSQL

L'image de MYSQL a été importée dans le docker-compose.yml

## Se connecter à la base de données

Créez la base de données avec la commande :

```bash
php bin/console make:docker:database
```

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
use addition
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