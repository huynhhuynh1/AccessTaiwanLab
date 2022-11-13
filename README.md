# AccessTawan Lab Readme
1. Implement the CRUD pages on resources articles and authors using Rails MVC functionality and fulfill the following constraints:
Bundle install 
```bash
bundle install
```
Migrate db
```bash
rails db:migrate
```
Server Start
```bash
rails s
```

## 3. Frontend part

3.1 Run backend Laravel
```bash
cd laravel-lumen-api
```
Install vendor
```bash
composer install 
```
Copy file env.example to .env
```bash
cp .env.example .env
```
Config .env file
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lumendb
DB_USERNAME=your_username
DB_PASSWORD=your_password
TOKEN_GITHUB=your_github_token
```

Migration DB
```bash
php artisan migrate
```

Start server backend 
```bash
php -S localhost:8000 -t public
```

3.2 Run frontend Vue
Install package
```bash
npm install
```
Run frontend server development
```bash
npm run dev
```




