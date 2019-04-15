### Le produit
  
Le Light AlarM (LAM ou SLAM) de MaDomotic.fr est un témoin lumineux fonctionnant en WiFi, équipés de 7 leds pour le LAM, ou de 12 leds pour la version SLAM.
L'allumage des Leds, le choix des couleurs, les animations, etc. sont des paramètres entièrement pilotables à partir de l'API intégrée.  
  
### Le plugin
  
Le Plugin Light Alarm fournit un actionneur pré-alimenté pour contrôler les différentes animations Led du Light AlarM via son API intégré.   
Ainsi qu'un actionneur "applications" dédiés au monitoring.  
Pour la version SLAM Switch et SLAM-Motion, 1 actionneur complémentaire est créé pour gérer les interactions du Switch ou du détecteur de mouvement.    
  
     
### Ajout des périphériques
Cliquez sur "Configuration" / "Ajouter ou supprimer un périphérique" / "Store eedomus" / "Light AlarM" / "Créer"  
  
*Voici les différents champs à renseigner:*

* [Obligatoire] - Le numéro de LAM/SLAM  
* [Obligatoire] - L'adrese IP locale du LAM  
* [Obligatoire] - Version LAM ou SLAM  
* [Optionnel]   - Type Switch Oui/Non
* [Optionnel]   - Type Motion Oui/Non 
* [Optionnel]   - L'adrese IP locale de la box eedomus (si Switch)  
* [Optionnel]   - Le code API USER eedomus (si Switch)  
* [Optionnel]   - Le code API SECRET eedomus (si Switch)  
     
Un périphérique actionneur "Contrôle" est créé avec des valeurs d'allumage et d'animation prédéfinies.  
Les paramètres de connexion au LAM sont en [VAR1].  
Les paramètres par défaut de vitesse d'animation, de luminosité et délais, sont en [VAR2].  
* [VAR2] - speed(50),bright(50),delay(10)  
La version du plugin et du firmware sur lequel se base ce plugin sont rappelés en [VAR3].  
  
Si SLAM-Switch, un périphérique actionneur "Switch" est créé pour tracer les actions sur le switch :  
  
* Appui court  
* Appui long  
* Double appui rapide  
* Triple appui rapide  
* Quadruple appui rapide  
  
Pour que le Switch soit utilisable, il vous faut actionner au préalable (1 seule fois) la valeur "Switch Initialization".  
  
Si SLAM-Motion, un périphérique actionneur "Motion" est créé pour tracer la détection de mouvement :  
  
* Prêt
* Détection de mouvement

Pour que le Motion soit utilisable, il vous faut actionner au préalable (1 seule fois) la valeur "Motion Initialization". 
  
  
Un périphérique actionneur "Apps" est créé pour gérer les applications de Monitoring intégrées du LAM/SLAM :  
  
* Time : affiche une représentation de l'heure actuelle (pour le SLAM exclusivement)  
* Rainbow, Patriot, Eedomus : exemples de commandes d'allumage des leds (pour le SLAM exclusivement)
* Timer : permet de définir un minuteur, avec affichage régulier du décompte et positionnement d'une alerte (valeur 12)  
* Ping Monitor : indicateur du statut des pings
* Alarm Monitor : indicateur d'activation de l'alarme  
* Delestage Monitor : indicateur du délestage en cours (Plugin "Délestage électrique")  
* Injection Monitor : indicateur d'injection d'électricité dans le réseau  
* SprinkDomus Monitor : indicateur de l'arrosage en cours (Plugin "SprinkDomus")  
* Etat des ouvertures : affiche l'état des ouvertures (Plugin "Etat des ouvertures pour Notifications")  

  
L'allumage des leds pour les applications de type "Monitor" n'est pas continu (sauf pour Délestage et Sprinkdomus). Entre deux polling, les leds s'éteignent.  
Plusieurs monitoring différents peuvent être activés, dans ce cas, le SLAM les restitue de manière cyclique polling après polling.  
  
  
### Apps - Ping Monitor  
Pour la valeur 15 du péripériphérique Apps,   
Fournir la liste des périphériques Ping eedomus à suivre dans l'url (12 maximum) : ...&action=ping&value=123456,234567   
  
### Apps - Alarm Monitor  
Pour la valeur 17 du péripériphérique Apps,   
Fournir le code api du périphérique du statut de votre alarme, et sa valeur lorsqu'elle est désarmée : ...&action=alarm&value=132456,0
  
### Apps - Delestage Monitor  
Seul prérequis, installer le plugin Délestage du store eedomus.  
Le lien entre le SLAM et le Délestage est automatique.  
  
### Apps - Injection Monitor  
Pour la valeur 21 du péripériphérique Apps,   
Fournir le code api du périphérique du statut de l'injection, et sa valeur lorsqu'il y a injection dans le réseau : ...&action=injection&value=132456,100
  
### Apps - SprinkDomus Monitor  
Seul prérequis, installer le plugin SprinkDomus du store eedomus pour le contrôle de l'arrosage automatique.   
Le lien entre le SLAM et la gestion de l'arrosage est automatique.  
La zone d'arrosage monitorée est précisée dans la variable "zone" des valeurs 23 et 24 du périphérique Apps : ...&zone=1&value=1  
      
### Configuration/installation préalable du LAM sur votre réseau local wifi  
Consulter la procédure d'installation sur [MaDomotic.fr](https://www.madomotic.fr/index.php/2019/02/08/light-alarm-lam/)  
  
  
  
Influman 2019
therealinfluman@gmail.com  
[Paypal Me](https://www.paypal.me/influman "paypal.me")  


  239438008
  
  0170918646



 

 

  


