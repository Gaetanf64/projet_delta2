# Projet DELTA 2

## Contexte

Ce projet a été réalisé dans le but d'exploiter les exigences d'un projet fictif sous forme d'interface Web.
Le code de l'application est disponible sur le repository LinuxEmb : https://github.com/Gaetanf64/LinuxEmb

## Projet application embarqué sur Raspberry PI

La société Delta2 aimerait mettre au point un système de détection de présence. Pour ce faire un premier prototype est à mettre en œuvre.

Une carte Raspberry pi3 est utilisée, sur cette carte nous avons un détecteur de mouvement, ainsi qu’un feu tricolore (diodes).

Principe de fonctionnement : 
- Sans détection de présence le feu est vert
- En passant la main devant le détecteur le feu devient orange
- En laissant la main devant le détecteur le feu est rouge

## Installation du projet 

* Cloner le projet avec gitclone 
```https://github.com/Gaetanf64/projet_delta2.git```
* Installer les dépendances 
``composer install``
* Créer la database Delta2 dans votre gestionnaire de base de données
* Redéfinir la configuration de la database dans config/Database.php avec les renseignements nécessaires pour l'accès à la base de données : 
``mysql:host=localhost;dbname=delta2;charset=utf8', 'root', ''``