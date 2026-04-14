# 🏥 Healthcare Management System (Laravel Activity 3)

A full-featured Healthcare Management System built with **Laravel 11**, designed to demonstrate **CRUD Operations**, **Middleware-based Authentication**, and **Eloquent Relationships**.

---

## 📊 Entity Relationship Diagram (ERD)
![Healthcare ERD](public/images/erd.png)


## 🚀 Installation & Setup
Clone the repository:
git clone https://github.com/currlei/healthcare_system.git
cd healthcare_system

Install Dependencies:
composer install
npm install

Configure Environment:
Create a database.sqlite file in the database/ folder.
Update your .env file:
DB_CONNECTION=sqlite

Initialize Database & Seed Data:
php artisan migrate:fresh --seed

Compile Assets & Start Server:
# Run in terminal 1
npm run dev
# Run in terminal 2
php artisan serve

## 🔐 Credentials (Seeded Data)
Role	Email	Password
Admin	admin@gmail.com	password123
User	user@gmail.com	password123

### Final Step: Push to GitHub
Now that the code is perfect and the README is ready, push everything to your repository:

1.  `git add .`
2.  `git commit -m "Finalized project with UI, CRUD, and Middleware"`
3.  `git push origin main` (or `master`)
