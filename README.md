# 🔐 JWT Auth Panel with 2FA Support

A secure and minimalistic authentication system built in PHP, featuring JSON Web Tokens (JWT) and Time-based One-Time Passwords (TOTP) for two-factor authentication.

### Made with ❤ by [xb3n6e](http://xb3n6e.hu/bio)

### If you like the project and would like to support my work, please show it by [reacting here](https://www.vouchley.com/review?user=xb3n6e&product=976322)

---

## 🚀 Features

- 📝 User registration with hashed passwords
- 🔑 JWT-based login authentication
- 🧾 Protected routes using middleware
- 🔒 2FA setup with TOTP (Google Authenticator compatible)
- 📷 QR code generation for easy 2FA onboarding
- ✅ 2FA verification endpoint
- 🧪 Python test scripts for API testing

---

## 📁 Project Structure

```File Structure
root/
  ├── .htaccess
  ├── .env
  ├── index.php
  ├── config.php
  ├── db.php
  ├── composer.json
  ├── composer.lock
  ├── vendor/
  ├── auth/
  │   ├── register.php
  │   ├── login.php
  │   ├── profile.php
  │   ├── middleware.php
  ├── addons/
  │   ├── 2fa/
  │   │   ├── enable.php
  │   │   ├── verify.php
  │   │   ├── qrcode.php
  ├── test_scripts/
      ├── reg_user.py
      ├── log_user.py
      ├── en_user.py
      ├── qr_user.py
      ├── ve_user.py
```

---

> ## 🧰 Tech Stack
- PHP 8+
- MySQL (PDO)
- Composer
- Firebase JWT
- OTPHP
- Endroid QR Code
- Python (for testing)

---

> ## 📦 Installation
```bash
git clone https://github.com/xb3n6e/jwt-auth-panel.git
cd jwt-auth-panel
composer install
```

> ## 📋 Import the database schema:

```sql
CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(100) UNIQUE,
  password TEXT,
  totp_secret TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

### ❗ For fast SQL code
```sql
CREATE DATABASE jwtauthpanelw2fa;

USE jwtauthpanelw2fa;

CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(100) UNIQUE,
  password TEXT,
  totp_secret TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```
#### After this, your database name is "jwtauthpanelw2fa"

---

> ## 🔧 Configuration
### Update `db.php` with your database credentials:

```php
$host = 'localhost';
$db   = 'jwtauthpanelw2fa';
$user = 'root';
$pass = '';
```

### Set your JWT secret in `config.php`:

```php
$jwt_secret = 'yourSecretKey';
$jwt_algo = 'HS256';
```

> ## 🧪 Python Test Scripts
- **reg_user.py** — *Register a new user*
- **log_user.py** — *Login and retrieve JWT*
- **en_user.py** — *Enable 2FA*
- **qr_user.py** — *Download QR code*
- **ve_user.py** — *Verify 2FA code*

> ## 📜 License
This project is for educational and personal use. Feel free to fork, modify, and build on it — credits appreciated!

> ## 🙌 Author
[xb3n6e](http://xb3n6e.hu/bio)

> ## 💕 Support
Feel free to contact with me on **Instagram**, **Discord**. The support is *always free*.
