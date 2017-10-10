Import/Export Fichier Excel en Base de donnée
========================

Cet outil permet l'importation/l'exportation de la base de donnée au format excel (CSV).

MAJ 10/10/17

Ajout d'un script (convert.php) de conversion LAT/LNG des adresses importer en CSV + MAJ de la base de données.

Comment l'utiliser ?
--------------

Dans le fichier <strong>config.php</strong>

  * Ajouter le HOST name
  
  * Le nom de la base de donnée

  * L'utilisateur de la BDD

  * Le mot de passe
  
Fonction d'importation des données
--------------

Dans le fichier <strong>import.php</strong>, définisser la ou les tables ou vos données seront importés.

Fonction d'exportation des données
--------------

Dans le fichier <strong>export.php</strong>, définisser la ou les tables ou vos données seront exportés.

Affichage des données dans le BO
--------------

Configurer le fichier <strong>index.php</strong> pour afficher les données des tables que vous voulez avez sélectionnés.