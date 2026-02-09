# Laravel API Project

A RESTful API built with **Laravel**, using **Sanctum** for authentication and a role-based access control (RBAC) system for user and product management. This API follows **JSON:API style** conventions for request and response structures.

---

## Features

🔐 Authentication & Authorization using Laravel Sanctum

👥 User Management with role-based permissions

🛍️ Product Management with ownership controls

🛡️ Policy-based Authorization for fine-grained access control

📦 API Resource Transformers for consistent response formatting

✅ Form Request Validation with custom rules

## API Endpoints

Authentication

| Method | Endpoint  | Description                      |
| ------ | --------- | -------------------------------- |
| POST   | `/login`  | Login user and receive API token |
| POST   | `/logout` | Logout user and revoke token     |

Users (Requires auth)
| Method | Endpoint | Description |
| ------ | ------------- | --------------------- |
| GET | `/users` | List all users |
| POST | `/users` | Create a new user |
| GET | `/users/{id}` | Retrieve user details |
| PUT | `/users/{id}` | Update user |
| DELETE | `/users/{id}` | Delete user |

Products (Requires auth)
| Method | Endpoint | Description |
| ------ | ---------------- | ------------------------ |
| GET | `/products` | List all products |
| POST | `/products` | Create a new product |
| GET | `/products/{id}` | Retrieve product details |
| PUT | `/products/{id}` | Update product |
| DELETE | `/products/{id}` | Delete product |

## Roles & Abilities

Manager (m)

Create, update, delete users

Create, update, delete all products

Producer (p)

Create, update, delete only own products

Customer (c)

Currently no permissions for create/update/delete

Abilities are managed in App\Permissions\Abilities.
