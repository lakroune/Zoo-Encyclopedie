# Zoo Encyclopedie : Système de Gestion et de Jeu d'Animaux

## Description du Projet

Cette application web est un système complet pour la gestion des animaux et de leurs habitats. Elle permet aux formateurs de réaliser des opérations CRUD (Créer, Lire, Mettre à jour, Supprimer) sur les données, de consulter des statistiques détaillées et propose également un mini-jeu éducatif interactif basé sur la reconnaissance visuelle des animaux.

## Fonctionnalités Clés

L'application est divisée en cinq modules principaux :

### 1. Gestion des Animaux

* **Affichage détaillé :** Présentation de l'ensemble des animaux avec leur image, nom, type alimentaire et habitat.
* **CRUD :** Possibilité d'**ajouter** un nouvel animal, de **modifier** les informations d'un animal existant, et de **supprimer** un animal (avec confirmation).
* **Recherche et Filtrage :** Fonctionnalité de recherche et de filtrage dynamique par **Habitat** et par **Type Alimentaire**.

### 2. Gestion des Habitats

* **Affichage :** Liste des habitats avec image, nom et description.
* **CRUD :** Possibilité d'**ajouter** un nouvel habitat, de **modifier** ses détails, et de le **supprimer** (avec confirmation).

### 3. Statistiques

Cette page fournit une vue d'ensemble chiffrée des données :

* Nombre total d'animaux et d'habitats.
* Pourcentage de répartition par **Type Alimentaire**.
* Nombre d'animaux classés par **Habitat**.

### 4. Jeu Animal (Quiz)

Un module ludique et éducatif pour tester ses connaissances sur les animaux :

* **Principe :** L'utilisateur est invité à devenir une image d'animal.
* **Mécanique :** Le nom de l'animal est affiché comme question, et l'utilisateur doit sélectionner l'image correspondante parmi trois propositions.

## Structure de la Base de Données

Le projet utilise une base de données nommée `zoo_db`. Les tables essentielles pour le fonctionnement de l'application sont :

| Table | Description | Champs Typiques  |
| :--- | :--- | :--- |
| **Animal** | Contient les données de chaque animal. | `id_animal`, `nom`, `url_image`, `type_alimentaire`, `id_habitat` (Clé étrangère) |
| **Habitat** | Contient les données descriptives de chaque habitat. | `id_habitat`, `nom`, `url_image`, `description` |

## Technologies Utilisées

| Catégorie | Outils/Langages  |
| :--- | :--- |
| **Frontend** | HTML, tailwind CSS, JavaScript |
| **Backend** | [PHP] |
| **Base de Données** | [ MySQL] |
| **Environnement** | [XAMPP] |

##  Lancement

1.  **lancer le dépôt :**
    ```bash
     [https://lakroune.space/zoo-app](https://lakroune.space/zoo-app)
    ```
  
 
## Auteurs

* [LAKROUNE]

## Licence

[Spécifiez la licence de votre choix, ex: MIT, Apache 2.0]