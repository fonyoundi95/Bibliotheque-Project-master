PROJET BIBLIOHEQUE
========================

Guide de deploiement du projet Bibliotheque

Installation
------------

Si vous avez deja installé le projet

```bash
$ cd bibliotheque project/
$ composer update
```
Si c'est votre première installation

```bash
$ cd bibliotheque project/
$ composer install
```

Creation du compte administrateur
---------------------------------

Si vous n'avez pas de compte administrateur, executez la commande ci dessous. Attention! elle va vider vos données.

```bash
$ cd bibliotheque project/
$ bin/console doctrine:fixtures:load
```
il va créer un compte avec user:`admin@admin.cm` et password:`admin`

Si vous voulez ajouter un nouveau compte executez la commande 

```bash
$ cd bibliotheque project/
$ bin/console bibliotheque:add-user --admin
```

Lancer le projet
-----------------

```bash
$ cd bibliotheque project/
$ symfony serve:start
```
pour lancer l'interface utilisateur <http://127.0.0.1:8000>
pour lancer l'interface d'aminsitration <http://127.0.0.1:8000/admin>

