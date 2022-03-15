# challenge5b_dungdd

Online classroom management web application using Laravel framework.

## Installation

```bash
git clone https://github.com/dungkaito/challenge5b_dungdd.git
cd challenge5b_dungdd
composer install
cp .env.example .env
php artisan key:generate
```

Make sure set the correct database connection information in Environment variables `.env` before running the migrations

```bash
php artisan migrate
php artisan serve
```
The web can now be accessed at
```url
http://localhost:8000/
```

## Database
Exported database file is located at
```bash
database/challenge5b_dungdd.sql
```
### Seeding

```bash
composer dump-autoload
php artisan migrate:fresh --seed
```
## Route list
![image](https://user-images.githubusercontent.com/48874865/158473141-cbc58433-10a6-497f-b37e-21de8c0b9866.png)


