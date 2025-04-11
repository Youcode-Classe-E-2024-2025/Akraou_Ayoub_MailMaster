# 📬 MailMaster – API Laravel de Gestion de Newsletters

Bienvenue dans **MailMaster**, une API RESTful développée avec **Laravel** pour permettre à une entreprise de gérer ses newsletters : abonnés, campagnes, listes de diffusion et statistiques.

---

## ⚙️ Stack Technique

- **Framework** : Laravel 12
- **Base de données** : MySQL
- **Authentification** : Laravel Sanctum
- **Documentation** : Swagger ou Laravel Scribe
- **Gestion de projet** : GitHub Projects (Kanban, backlog)
- **Tests** : PHPUnit (à venir jour 5-8)

---

## 🚀 Installation du Projet

```bash
git clone https://github.com/votre-utilisateur/mailmaster.git
cd mailmaster

composer install
cp .env.example .env
php artisan key:generate

# Modifier la config BDD dans le fichier .env

php artisan migrate
php artisan serve
```
# 🔐 Authentification avec Laravel Sanctum

## Inscription
`POST /api/register`  
**Body** : `name`, `email`, `password`, `password_confirmation`

## Connexion
`POST /api/login`  
**Body** : `email`, `password`

## Déconnexion
`POST /api/logout` *(Token requis)*

# 🗃️ Modèles & Endpoints CRUD

## 📨 Newsletters
- `GET /api/newsletters` – Lister les newsletters
- `POST /api/newsletters` – Créer une newsletter
- `GET /api/newsletters/{id}` – Voir une newsletter
- `PUT /api/newsletters/{id}` – Modifier une newsletter
- `DELETE /api/newsletters/{id}` – Supprimer une newsletter

## 👥 Subscribers (Abonnés)
- `GET /api/subscribers` – Lister les abonnés
- `POST /api/subscribers` – Ajouter un abonné
- `GET /api/subscribers/{id}` – Voir un abonné
- `PUT /api/subscribers/{id}` – Modifier un abonné
- `DELETE /api/subscribers/{id}` – Supprimer un abonné

## 📤 Campaigns (Campagnes)
- `GET /api/campaigns` – Lister les campagnes
- `POST /api/campaigns` – Créer une campagne
- `GET /api/campaigns/{id}` – Voir une campagne
- `PUT /api/campaigns/{id}` – Modifier une campagne
- `DELETE /api/campaigns/{id}` – Supprimer une campagne

# 🧾 Documentation API
La documentation de l'API est générée avec Swagger ou Scribe.  
**Accès** : `http://localhost:8000/docs` ou `/api/documentation`

# 📌 Suivi du Projet
Gestion via GitHub Project :
- ✅ Backlog rempli
- ✅ Tableau Kanban configuré
- ✅ Tâches organisées par priorité

## ✅ Livrables – Phase 1 (Jours 1 à 4)
| Éléments livrés                     | Statut |
|-------------------------------------|--------|
| Création du projet Laravel         | ✅     |
| Configuration de la base de données | ✅     |
| Authentification via Sanctum       | ✅     |
| Entités : User, Newsletter, Subscriber, Campaign | ✅ |
| Endpoints CRUD complets            | ✅     |
| Installation de Swagger / Scribe    | ✅     |
| Documentation API partielle générée | ✅     |
| README de projet                   | ✅     |

# 📂 Structure des Dossiers (extrait)
```
app/
├── Models/
│ ├── User.php
│ ├── Newsletter.php
│ ├── Subscriber.php
│ └── Campaign.php
├── Http/
│ ├── Controllers/
│ │ ├── AuthController.php
│ │ ├── NewsletterController.php
│ │ ├── SubscriberController.php
│ │ └── CampaignController.php
routes/
├── api.php
```

# 📧 Auteur
**Nom** : Ayoub AKRAOU 
