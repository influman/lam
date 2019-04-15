### Le produit
  
Le Light AlarM (LAM ou SLAM) de MaDomotic.fr est un t�moin lumineux fonctionnant en WiFi, �quip�s de 7 leds pour le LAM, ou de 12 leds pour la version SLAM.
L'allumage des Leds, le choix des couleurs, les animations, etc. sont des param�tres enti�rement pilotables � partir de l'API int�gr�e.  
  
### Le plugin
  
Le Plugin Light Alarm fournit un actionneur pr�-aliment� pour contr�ler les diff�rentes animations Led du Light AlarM via son API int�gr�.   
Ainsi qu'un actionneur "applications" d�di�s au monitoring.  
Pour la version SLAM Switch et SLAM-Motion, 1 actionneur compl�mentaire est cr�� pour g�rer les interactions du Switch ou du d�tecteur de mouvement.    
  
     
### Ajout des p�riph�riques
Cliquez sur "Configuration" / "Ajouter ou supprimer un p�riph�rique" / "Store eedomus" / "Light AlarM" / "Cr�er"  
  
*Voici les diff�rents champs � renseigner:*

* [Obligatoire] - Le num�ro de LAM/SLAM  
* [Obligatoire] - L'adrese IP locale du LAM  
* [Obligatoire] - Version LAM ou SLAM  
* [Optionnel]   - Type Switch Oui/Non
* [Optionnel]   - Type Motion Oui/Non 
* [Optionnel]   - L'adrese IP locale de la box eedomus (si Switch)  
* [Optionnel]   - Le code API USER eedomus (si Switch)  
* [Optionnel]   - Le code API SECRET eedomus (si Switch)  
     
Un p�riph�rique actionneur "Contr�le" est cr�� avec des valeurs d'allumage et d'animation pr�d�finies.  
Les param�tres de connexion au LAM sont en [VAR1].  
Les param�tres par d�faut de vitesse d'animation, de luminosit� et d�lais, sont en [VAR2].  
* [VAR2] - speed(50),bright(50),delay(10)  
La version du plugin et du firmware sur lequel se base ce plugin sont rappel�s en [VAR3].  
  
Si SLAM-Switch, un p�riph�rique actionneur "Switch" est cr�� pour tracer les actions sur le switch :  
  
* Appui court  
* Appui long  
* Double appui rapide  
* Triple appui rapide  
* Quadruple appui rapide  
  
Pour que le Switch soit utilisable, il vous faut actionner au pr�alable (1 seule fois) la valeur "Switch Initialization".  
  
Si SLAM-Motion, un p�riph�rique actionneur "Motion" est cr�� pour tracer la d�tection de mouvement :  
  
* Pr�t
* D�tection de mouvement

Pour que le Motion soit utilisable, il vous faut actionner au pr�alable (1 seule fois) la valeur "Motion Initialization". 
  
  
Un p�riph�rique actionneur "Apps" est cr�� pour g�rer les applications de Monitoring int�gr�es du LAM/SLAM :  
  
* Time : affiche une repr�sentation de l'heure actuelle (pour le SLAM exclusivement)  
* Rainbow, Patriot, Eedomus : exemples de commandes d'allumage des leds (pour le SLAM exclusivement)
* Timer : permet de d�finir un minuteur, avec affichage r�gulier du d�compte et positionnement d'une alerte (valeur 12)  
* Ping Monitor : indicateur du statut des pings
* Alarm Monitor : indicateur d'activation de l'alarme  
* Delestage Monitor : indicateur du d�lestage en cours (Plugin "D�lestage �lectrique")  
* Injection Monitor : indicateur d'injection d'�lectricit� dans le r�seau  
* SprinkDomus Monitor : indicateur de l'arrosage en cours (Plugin "SprinkDomus")  
* Etat des ouvertures : affiche l'�tat des ouvertures (Plugin "Etat des ouvertures pour Notifications")  

  
L'allumage des leds pour les applications de type "Monitor" n'est pas continu (sauf pour D�lestage et Sprinkdomus). Entre deux polling, les leds s'�teignent.  
Plusieurs monitoring diff�rents peuvent �tre activ�s, dans ce cas, le SLAM les restitue de mani�re cyclique polling apr�s polling.  
  
  
### Apps - Ping Monitor  
Pour la valeur 15 du p�rip�riph�rique Apps,   
Fournir la liste des p�riph�riques Ping eedomus � suivre dans l'url (12 maximum) : ...&action=ping&value=123456,234567   
  
### Apps - Alarm Monitor  
Pour la valeur 17 du p�rip�riph�rique Apps,   
Fournir le code api du p�riph�rique du statut de votre alarme, et sa valeur lorsqu'elle est d�sarm�e : ...&action=alarm&value=132456,0
  
### Apps - Delestage Monitor  
Seul pr�requis, installer le plugin D�lestage du store eedomus.  
Le lien entre le SLAM et le D�lestage est automatique.  
  
### Apps - Injection Monitor  
Pour la valeur 21 du p�rip�riph�rique Apps,   
Fournir le code api du p�riph�rique du statut de l'injection, et sa valeur lorsqu'il y a injection dans le r�seau : ...&action=injection&value=132456,100
  
### Apps - SprinkDomus Monitor  
Seul pr�requis, installer le plugin SprinkDomus du store eedomus pour le contr�le de l'arrosage automatique.   
Le lien entre le SLAM et la gestion de l'arrosage est automatique.  
La zone d'arrosage monitor�e est pr�cis�e dans la variable "zone" des valeurs 23 et 24 du p�riph�rique Apps : ...&zone=1&value=1  
      
### Configuration/installation pr�alable du LAM sur votre r�seau local wifi  
Consulter la proc�dure d'installation sur [MaDomotic.fr](https://www.madomotic.fr/index.php/2019/02/08/light-alarm-lam/)  
  
  
  
Influman 2019
therealinfluman@gmail.com  
[Paypal Me](https://www.paypal.me/influman "paypal.me")  


  239438008
  
  0170918646



 

 

  


