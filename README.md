1. composer install

2. переименовываем .env.example (в нем уже настроенная почта) в .env

3. Вставляем данные бд в .env

4. php artisan migrate --seed

5. php artisan queue:table

6. php artisan serve

Не забываем поставить Accept: application/json в postman