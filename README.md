# projet-social-2020-Charles-Antoine-Gabriel-Jacob

À NÔTER : L'APPLICATION FONCTIONNE SEULEMENT EN LOCAL DEPUIS LA DERNIÈRE MISE-À-JOUR (SYSTÈME DE CONTACT), CAR LA BASE DE DONNÉES (QUI A ÉTÉ MODIFIÉ) N'A PAS ENCORE ÉTÉ MISE-À-JOUR SUR LE SERVEUR! AUSSI, PAR CONSÉQUENT, LE SCHÉMA DE LA BASE DE DONNÉES, LES MAQUETTES, ETC NE SONT PLUS VALIDES!

Thème de l'application : Application de chat

Équipe :

- Charles
- Antoine
- Gabriel
- Jacob

Fiche de remise : https://docs.google.com/presentation/d/1mo011MwXWcd-ysc6iVHE_5Y_kD5_dI9cB26zDSV3Dpo/edit?usp=sharing

## Vidéo de présentation

### À nôté que le visuel de l'application dans la vidéo n'est plus à jour!

https://youtu.be/cAOY5tcosTw

## Informations d'installations : 

1. Télécharger le dossier "ggchat_electron4php" présent dans https://github.com/CharlesC1337/projet-social-2020-Charles-Antoine-Gabriel-Jacob et le mettre ou vous voulez.

2. Télécharger node.js si pas déjà fait et ouvrir node.js command prompt.

3. Se rendre dans le dossier "ggchat_electron4php" copié précédamment en utilisant les commandes "cd".

4. Faire "npm start" pour démarrer l'application et enjoy! :)

## Informations sur l'application : 

Application fait en php avec electron.

Base de données postgresql sur un serveur vps distant (Celui à antoine).

Pour autres informations voir fiche de remise : https://docs.google.com/presentation/d/1mo011MwXWcd-ysc6iVHE_5Y_kD5_dI9cB26zDSV3Dpo/edit?usp=sharing

## Informations sur la hiéarchie github :

- Le dossier "electron_4_php" est le "template" de electron pour php de base.
- Le dossier "ggchat_php" est le code php comme tel.
- Le dossier "ggchat_electron4php" est l'application finale electron.
- Le dossier Maquette contient les maquettes.
- Le dossier "OptimisationServeur" contient les optimisations apposées au côté du serveur, donc Charles et Antoine.
- Le fichier "ggchatlocal.sql" contient l'export sql de la base de donnée fait à la main.
- Le fichier "ggchat.sql" contient l'export sql de la base de donnée présentement sur le serveur fait à l'aide de la commande "pg_dump".
- Le fichier "schema_bd.png" correspond au schéma de la base de données.

## Commande CRON pour optimisation archivage (Charles) : 

Script dans ggchat_php\optimisations\Archivage.php

### 1 : Importer le script php sur le serveur

### 2 : Rendre le script php executable

cd path/of/php/script

chmod +x Archivage.php

### 3 : Trouver le chemin vers php (pour étape suivante): 

whereis php

### 4 : CRONTAB

crontab -e

0 0 * * * path/of/php path/of/php/script

ex : 0 0 * * * /usr/local/bin/php /var/scripts/Archivage.php

## Commande pour Redis (Antoine) :

sudo apt-get install php-redis
sudo apt install redis-server

### 2 Crontab

crontab -e
0 0 * * * /usr/local/bin/php /var/scripts/UpdateListeSalonRedis.php
