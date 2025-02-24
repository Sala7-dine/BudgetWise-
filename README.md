# 📊 BudgetWise - Gestion Budgétaire Intelligente

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## 📌 À propos de BudgetWise
BudgetWise est une plateforme qui simplifie la gestion budgétaire en permettant aux utilisateurs de suivre leurs revenus, leurs dépenses et leurs objectifs d’épargne tout en recevant des recommandations intelligentes grâce à l'IA. 🚀

---

## 🎯 Fonctionnalités Principales

| 🏷️ Fonctionnalité         | 🔎 Description |
|------------------------|-------------|
| 🏠 Page d'accueil     | Présentation générale de l'application. |
| 📝 Inscription       | Saisie du salaire et date de crédit. |
| 🔐 Connexion et récupération de mot de passe | Authentification sécurisée avec récupération possible. |
| 💰 Gestion des revenus | Saisie et modification du salaire mensuel avec crédit automatique. |
| 🛍️ Gestion des dépenses | Ajout, modification et suppression des dépenses avec catégorisation. |
| 🔁 Dépenses récurrentes | Ajout et gestion des dépenses mensuelles fixes (loyer, abonnements, etc.). |
| 🚨 Alertes budgétaires | Notification en cas de dépassement d'un seuil défini. |
| 📊 Tableau de bord | Vue détaillée du budget, des dépenses et des économies. |
| 🎯 Objectifs d’épargne | Définition et suivi des objectifs d’épargne. |
| 🛒 Liste de souhaits | Suivi des objets souhaités avec progression financière. |
| 📩 Notifications email | Alertes et mises à jour sur l’état du budget. |

---

## 🛠️ Technologies Utilisées

| Technologie | Description |
|------------|-------------|
| 🏗️ **Framework** | Laravel (PHP) |
| 🗄️ **Base de données** | MySQL / PostgreSQL |
| ☁️ **Déploiement** | AWS / Azure / DigitalOcean |
| 🔐 **Sécurité** | Hachage des mots de passe, protection XSS, requêtes sécurisées |
| 📈 **IA** | Intégration de Gemini AI pour suggestions budgétaires |
| 📊 **Front-end** | Blade / Vue.js (optionnel) |
| 📨 **Notifications** | Emails automatiques (ex. alertes de seuil) |

---

## 📌 Rôles et Accès

| 👤 Rôle | 🔑 Accès |
|--------|--------|
| 👨‍💻 **Utilisateur** | Gestion des dépenses, revenus, objectifs et alertes. |
| 👑 **Administrateur** | Ajout de catégories, gestion des utilisateurs, statistiques. |

---

## 📂 Installation & Déploiement

1. **Cloner le projet** 🛠️
```sh
 git clone https://github.com/votre-repo/BudgetWise.git
 cd BudgetWise
```
2. **Installer les dépendances** 📦
```sh
composer install
npm install
```
3. **Configurer l'environnement** ⚙️
```sh
cp .env.example .env
php artisan key:generate
```
4. **Configurer la base de données** 🗄️
```sh
php artisan migrate --seed
```
5. **Lancer l'application** 🚀
```sh
php artisan serve
```

---
