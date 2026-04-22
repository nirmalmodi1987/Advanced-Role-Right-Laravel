<p align="center">
  <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=AdvancedRoleRight" alt="Logo" width="80" height="80">
  <h1 align="center">Advanced Role-Right</h1>
  <p align="center">
    Enterprise RBAC for Laravel with a Premium Glassmorphism UI.
    <br />
    <a href="#-installation"><strong>Quick Start »</strong></a>
    <br />
    <br />
    <img src="https://img.shields.io/badge/PHP-8.2%2B-8892bf?style=flat-square&logo=php" alt="PHP Version">
    <img src="https://img.shields.io/badge/Laravel-10%2F11-ff2d20?style=flat-square&logo=laravel" alt="Laravel Version">
    <img src="https://img.shields.io/badge/License-MIT-green?style=flat-square" alt="License">
  </p>
</p>

---

### 🌟 Why Advanced Role-Right?
Stop wasting time building admin panels for roles and permissions. **Advanced Role-Right** gives you a production-ready, beautiful management system out of the box.

*   **🎨 Glassmorphism UI**: High-end management dashboard included.
*   **🧩 Smart Matrix**: Grouped permission mapping with bulk-select.
*   **📜 Audit Trail**: Full history of every security change.
*   **🚀 Blade Ready**: Use `@role` and `@permission` instantly.

---

### 🛠️ Installation

**Step 1: Install via Composer**
```bash
composer require nirmal/advanced-role-right
```

**Step 2: Initialize the System**
```bash
php artisan role-right:install
```

**Step 3: Update your User Model**
Add the `HasRoles` trait to your `User` model:
```php
use Nirmal\RoleRight\Traits\HasRoles;

class User extends Authenticatable {
    use HasRoles;
}
```

---

### 📖 Quick Usage

| Directive | Usage |
| :--- | :--- |
| **@role** | `@role('admin') ... @endrole` |
| **@permission** | `@permission('edit-post') ... @endpermission` |
| **UI Access** | Visit your-app.test/role-right |

---

### ❤️ Support Nirmal's Developing Hub
Building advanced open-source tools requires passion and time. If this project helps you, consider a small donation.

**UPI ID: `nirmalmodi.mca@okhdfcbank`**

> **Supported Apps:**  
> ![GPay](https://img.shields.io/badge/Google%20Pay-vibrant?style=flat-square&logo=googlepay&logoColor=white&color=4285F4) ![PhonePe](https://img.shields.io/badge/PhonePe-vibrant?style=flat-square&logo=phonepe&logoColor=white&color=5f259f) ![Paytm](https://img.shields.io/badge/Paytm-vibrant?style=flat-square&logo=paytm&logoColor=white&color=00BAF2)
> 
> *Scan to support*  
> ![UPI QR Code](https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=upi://pay?pa=nirmalmodi.mca@okhdfcbank&pn=Nirmal%20Modi)

---
<p align="center">
  Built with ❤️ by <strong>Nirmal Modi</strong>
</p>
