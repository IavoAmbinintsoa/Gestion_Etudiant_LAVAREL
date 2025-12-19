# Gestion des Étudiants

Application web de gestion d'étudiants développée avec Laravel 11.

## Prérequis

- PHP >= 8.2
- Composer >= 2.0
- MySQL >= 8.0
- Apache/Nginx
- Git

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/IavoAmbinintsoa/Gestion_Etudiant_LAVAREL.git
cd Gestion_Etudiant_LAVAREL
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Configuration de l'environnement

Copier le fichier de configuration :

```bash
cp .env.example .env
```

Modifier le fichier `.env` avec vos paramètres :

```env
APP_NAME="Gestion Étudiants"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_etudiants
DB_USERNAME=votre_username
DB_PASSWORD=votre_password
```

### 4. Générer la clé d'application

```bash
php artisan key:generate
```

### 5. Créer la base de données

Connectez-vous à MySQL :

```bash
mysql -u root -p
```

Créez la base de données :

```sql
CREATE DATABASE gestion_etudiants CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

### 6. Exécuter les migrations

```bash
php artisan migrate
```

### 7. Peupler la base de données

```bash
php artisan db:seed
```

Cette commande créera :
- 2 utilisateurs de test
- 3 étudiants d'exemple

### 8. Lancer le serveur de développement

```bash
php artisan serve
```

L'application sera accessible sur : `http://localhost:8000`

## Identifiants de test

### Compte administrateur

- **Username** : admin
- **Password** : admin123

### Compte utilisateur

- **Username** : test
- **Password** : test123

## Structure du projet

```
Gestion_Etudiant_LAVAREL/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   └── LoginController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── StudentController.php
│   │   │   └── LanguageController.php
│   │   └── Middleware/
│   │       └── SetLocale.php
│   └── Models/
│       ├── User.php
│       └── Student.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   └── 2025_12_18_095021_create_students_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── UserSeeder.php
│       └── StudentSeeder.php
├── lang/
│   ├── fr/
│   │   └── messages.php
│   └── en/
│       └── messages.php
├── public/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── main.js
├── resources/
│   └── views/
│       ├── auth/
│       │   └── login.blade.php
│       ├── layouts/
│       │   └── app.blade.php
│       ├── students/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── edit.blade.php
│       └── dashboard.blade.php
├── routes/
│   └── web.php
├── .env.example
├── .gitignore
├── composer.json
└── README.md
```
