# 🗺️ Roadmap – GAC de PAC

Cette roadmap décrit les grandes étapes de développement et les fonctionnalités prévues pour le nouveau site GAC Pont-à-Celles.  
Elle suit la nomenclature de version **SemVer** (`MAJEUR.MINEUR.PATCH`)

---

## 📌 Nomenclature des versions

| Type de version | Exemples | Signification                                                                      |
| --------------- | -------- | ---------------------------------------------------------------------------------- |
| **MAJEUR**      | `1.x.x`  | Version déployée en production, avec changements potentiellement incompatibles.    |
| **MINEUR**      | `x.1.x`  | Ajout de nouvelles fonctionnalités rétrocompatibles.                               |
| **PATCH**       | `x.x.1`  | Corrections de bugs ou améliorations mineures sans impact sur les fonctionnalités. |

---

## Roadmap

### ✅ 0.1.0 - Base App

- Création d'un projet CodeIgniter 4 et du dépôt Github
- Configuration du projet
- Installation et configuration de TailwindCSS
- Installation et configuration de mkdocs
- Documentation minimale et déploiement sur Github pages

### 🎯 0.2.0 - Authentication & User Profile

- Installation de CodeIgniter Shield 1.2.0 pour l'authentification
- Création du module Auth pour personnaliser CI Shield
- Configuration des rôles utilisateurs (customer, producer, manager, admin)
- Création des vues d'authentification (login, register, magic-link)
- Création du profil client (view, edit)
- Modification du flux d'authentification

### 🎯 0.3.0 - Core Structure

- Création du système de période de commande
- Modèle de base pour les produits, les catégories, les producteurs
- Structure de base de la base de données
- Système de gestion des statuts de période (préparation, ouverte, fermée)

### 🎯 0.4.0 - Producer Management

- Interface producteur pour gestion des produits
- CRUD produits avec gestion de stocks et prix
- Upload d'images pour les produits
- Dashboard producteurs avec statistiques basiques

### 🎯 0.5.0 - Customer Shop

- Catalogue produits avec filtrage par producteur/catégorie
- Système de panier avec gestion des quantités
- Processus de commande simplifiée (sans paiement)
- Historique des commandes

### 🎯 0.6.0 - Order System

- Gestion des commandes multi-producteurs
- Notification des producteurs après fermeture de période
- Génération de rapports de commande par producteur

### 🎯 0.7.0 - Admin Dashboard

- Interface d'administration complète
- Gestion des utilisateurs et permissions
- Configuration des périodes de commande
- Statistiques globales et reporting

> L'interface admin sera développée au fur et à mesure du projet, accompagnant les autres fonctionnalités. Cette version vise donc à l’homogénéisation et l'amélioration de cette interface afin de la rendre complète et cohérente.

---

> 📌 Cette roadmap est susceptible d'évoluer en fonction des retours utilisateurs et des contraintes techniques rencontrées.
