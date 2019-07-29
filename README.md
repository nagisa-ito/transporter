# Transporter
## Vue.js + Firebase + Laravel

## Frontend
### Vue.js needed
- Node.js >= v8.9.0
- npm

## Backend API
### Laravel needed
- PHP >= 7.1.3
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

### MySQL v8.0.x

## Constitution
```
transporter/  
  ├ client/
  │  └ Vue.js on Vue CLI 3
  ├ server/
  │  └ Laravel Project
  ├ deploy/
  │  └ Dockerfile on Each Service
  ├ mysql_conf
  │  └ MySQL config file
  ├ .data
     └ MySQL BackUp Data
```

## Usage
```
$ git clone https://github.com/nagisa-ito/transporter.git
$ cd transporter
$ cp .env.example .env
```
EDIT .env

```
$ docker-compose build
$ docker-compose up -d
$ cd server
$ cp .env.example .env
```
EDIT .env

```
$ cd ..
$ docker-compose exec app bash
$ composer install
$ php artisan migrate
$ php artisan db:seed
```
