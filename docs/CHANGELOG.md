# 📜 Changelog – GAC de PAC

Ce fichier suit le format [Keep a Changelog](https://keepachangelog.com/fr/1.1.0/) et utilise la nomenclature [SemVer](https://semver.org/lang/fr/).

## [0.2.0] - 2025-09-21

### Ajouté

- **Dépendances** : Ajout de `codeigniter4/shield` pour l'authentification.
- **Module Auth** : Structure de base pour la gestion de l'authentification.
  - **Groupes** : Définition des rôles (`customer`, `producer`, `manager`, `admin`).
  - **Routes** : Intégration des routes d'authentification de Shield.
- **Helpers** : Ajout des helpers `auth` et `setting`.

### Modifié

- **Configuration** :
  - **Autoload** : Ajout du namespace `App\Modules\Auth` et des helpers.
  - **Sécurité** : Utilisation de la session pour la protection CSRF.
- **Vues** : Mise à jour des liens de connexion et d'inscription sur la page d'accueil.

## [0.1.0] - 2025-09-20

### Ajouté

- **Framework** : CodeIgniter 4.6.3 avec configuration initiale
- **Styling** : Tailwind CSS 4.1 via PostCSS et configuration
- **Documentation** : MkDocs avec structure de base et configuration
- **Configuration** : Timezone Europe/Brussels, locale fr_FR, base URL
- **Setup** : Environnement de développement initialisé

## Légende des sections

- **Ajouté** – Nouvelles fonctionnalités.
- **Modifié** – Changements de comportement ou d’API.
- **Supprimé** – Fonctionnalités supprimées.
- **Corrigé** – Résolution de bugs.
- **Sécurité** – Changements liés à la sécurité.

## Nomenclature des versions

| Type de version | Exemples | Signification                                                                      |
| --------------- | -------- | ---------------------------------------------------------------------------------- |
| **MAJEUR**      | `1.x.x`  | Version déployée en production, avec changements potentiellement incompatibles.    |
| **MINEUR**      | `x.1.x`  | Ajout de nouvelles fonctionnalités rétrocompatibles.                               |
| **PATCH**       | `x.x.1`  | Corrections de bugs ou améliorations mineures sans impact sur les fonctionnalités. |

---

> 📌 Chaque nouvelle version devra être ajoutée en haut de ce fichier avec un lien vers le tag GitHub correspondant.
