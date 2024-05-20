# How to run

1. Clone this repository and navigate to the cloned directory using terminal
2. Run "composer install"
3. Run "cp .env.example .env"
4. Run "php spark db:create ci4"
5. Run "php artisan migrate"
6. Run "php spark db:seed DefaultSeeder"
7. Run "php spark serve" then open "http://localhost:8080" in your web browser

# note

- Make sure your php version is 8.0 or later
- Make sure to follow the steps sequentially.
- Temporary admin account => username : admin, password : 12345
