# PHP API Client Architecture (Native)

A lightweight API-driven application built using **Native PHP**.
This project demonstrates a clean separation between:

* **API Server** – Handles database operations and returns JSON response
* **Client App** – Consumes API via cURL and renders data in HTML views

The goal is to understand and implement **RESTful API architecture**,
**cURL-based HTTP requests**, and **modular MVC structure without frameworks**.

---

## 🔥 Features

### 🖥 Client App

* MVC-like structure (Controller, Views, CurlClient)
* Consume API via cURL (GET, POST, PUT, DELETE)
* Modal-based CRUD (Create, Read, Update, Delete)
* Clean route handling (`web.php?action=...`)
* Redirect, form request handling, and dynamic response

### 🌐 API Server

* RESTful API in Native PHP
* JSON responses with HTTP status codes
* Endpoint-based structure (`users/index.php`, `users/create.php`, etc.)
* PDO-based database access
* Password hashing for secure user storage

---

## 📁 Project Structure

```
belajar-php-native/
│
├── api-server/
│   ├── config/
│   │   └── database.php
│   └── endpoints/
│       └── users/
│           ├── index.php     # GET all users
│           ├── show.php      # GET single user
│           ├── create.php    # POST - create user
│           ├── update.php    # PUT - update user
│           └── delete.php    # DELETE - delete user
│
├── client-app/
│   ├── config/
│   │   └── api_config.php
│   ├── controllers/
│   │   └── UsersController.php
│   ├── core/
│   │   └── CurlClient.php     # Handles cURL API Requests
│   ├── views/
│   │   └── users/
│   │       ├── index.php      # Main UI (CRUD modal-based)
│   │       ├── create.php     # (optional)
│   │       └── edit.php       # (optional)
│   ├── routes/
│   │   └── web.php            # Basic Routing
│   └── index.php              # Entry point
│
└── README.md
```

---

## 🔌 Tech Stack

| Layer               | Technology                       |
| ------------------- | -------------------------------- |
| Client Application  | Native PHP, HTML, Modal-based UI |
| API Communication   | PHP cURL                         |
| API Response Format | JSON (REST)                      |
| Database            | MySQL (via PDO)                  |
| Server Stack        | Apache (Laragon/XAMPP)           |

---

## ⚙️ Installation & Setup

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/your-username/php-api-client-architecture.git
cd php-api-client-architecture
```

### 2️⃣ Configure API

`api-server/config/database.php`

```php
$host = "localhost";
$db_name = "your_database";
$username = "root";
$password = "";
```

### 3️⃣ Configure Client API URL

`client-app/config/api_config.php`

```php
define("API_BASE_URL", "http://localhost/belajar-php-native/api-server/endpoints/");
```

### 4️⃣ Ensure cURL is enabled in php.ini

```ini
extension=curl
```

Restart Apache/Laragon after enabling.

---

## 🚀 Usage

### Run API

```
http://localhost/belajar-php-native/api-server/endpoints/users/index.php
```

### Run Client Application

```
http://localhost/belajar-php-native/client-app/
```

> Auto loads UsersController@index
> Displays users table with modal-based CRUD

---

## 🚧 Future Enhancements

* 🔐 Authentication with token-based login (JWT / OAuth)
* ⚠ Server-side validation and error handling
* 📄 Pagination and search
* 📁 File upload via API (image/avatar)
* ⚛ Migration to AJAX (Single Page API Client)
* 🧱 Refactor toward mini PHP MVC Framework

---

## 📄 License

MIT License. Free to use, modify, and improve.

---

## 👤 Author

**Muhammad Farras Subahan**
Web Developer & API Learner
🚀 Focus: Native PHP, API Architecture, Laravel, Next.js

---

> "Frameworks come later. Foundation always comes first."
