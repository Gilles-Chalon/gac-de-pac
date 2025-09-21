# 📜 Changelog – GAC de PAC

Ce fichier suit le format [Keep a Changelog](https://keepachangelog.com/fr/1.1.0/) et utilise la nomenclature [SemVer](https://semver.org/lang/fr/).

## [0.2.0] - 2025-09-21

### Ajouté

- **Authentification** : Intégration de CodeIgniter Shield 1.2.O
- **Module Auth** : Configuration de base de CI Shield
  - **Configuration** : Définition des groupes et du groupe par défaut
  - **Routes** : Ajout des routes par défaut de Shield

### Modifié

- **Page d'accueil** : Ajout des liens vers la pages d'inscription et de connexion
- **Configuration** : Adaptation de la configuration de l'application pour l'intégration de Shield

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
