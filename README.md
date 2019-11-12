# Transporter (In development):beginner:
## Laravel + Vue.js + Buefy

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
  ├ src/
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
:memo:edit .env

```
$ docker-compose build
$ docker-compose up -d
$ cd src
$ cp .env.example .env
```
:memo:edit .env

```
$ cd ..
$ docker-compose exec app bash
$ composer install
$ php artisan migrate
$ php artisan db:seed
```
