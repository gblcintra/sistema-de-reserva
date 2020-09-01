## CapitólioCamping
## Installation

- Git Flow
```
$ git flow init
```

- Clone repository
```
$ git clone https://gitlab.com/hizilabs/campcap
```

- Access directory
```
$ cd CampCap
```

- Copy `.env.example` to `.env` and add your configs
```
$ cp .env.example .env
```

- Install PHP dependencies ([composer](http://getcomposer.org))
```
$ composer install
```

- Generate new key
```
$ php artisan key:generate
```

- Configure your database access
```
$ vim .env
```

- Run artisan commands.
```
$ php artisan migrate --seed && php artisan db:seed
```

## Run tests
```
$ ./vendor/bin/phpunit 
```

## Server start

- Open new terminal
```
$ php artisan serve
```

- *user: camp@capi.com.br
- *password: admin