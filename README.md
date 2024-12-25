## Steps for run the project

1. Clone the repository
2. cp .env.example .env
3. composer install
4. npm install
5. php artisan key:gen
6. php artisan migrate:fresh --seed
7. php artisan storage:link
8. composer run dev