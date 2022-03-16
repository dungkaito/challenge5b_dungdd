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

## File Storage

## Localhost

 By default, the `public` disk uses the `local` driver and stores these files in `storage/app/public`. To make them accessible from the web, we should create a symbolic link from `public/storage` to `storage/app/public`

```bash
php artisan storage:link
php artisan config:cache
```
## Shared hosting
On some web shared hosting services, **symlink()** has been disabled for security reasons. In that situation, web have to change these line in the filesystem configuration file `/config/filesystems.php`

```
'default' => env('FILESYSTEM_DRIVER', 'public'),

...

'disks' => [

        ...

        'public' => [
            'driver' => 'local',
            'root' => base_path('public_html'),
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        ...

],
```
Remember clear old Laravel cache: delete all files from `/bootstrap/cache`.


## Route list
![image](https://user-images.githubusercontent.com/48874865/158473141-cbc58433-10a6-497f-b37e-21de8c0b9866.png)


