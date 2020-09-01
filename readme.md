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

<h2>Tela de Login</h2>
<img scr"https://github.com/gblcintra/sistema-de-reserva/blob/master/public/images/login.png" />
<h2>Registro de Reserva</h2>
<img scr"https://github.com/gblcintra/sistema-de-reserva/blob/master/public/images/Cadastro%20de%20Reserva.png" />
<h2>Tela de Usuário</h2>
<img scr"https://github.com/gblcintra/sistema-de-reserva/blob/master/public/images/localhost_users.png" />
<img scr"https://github.com/gblcintra/sistema-de-reserva/blob/master/public/images/localhost_users_create.png" />
<h2>Tela de Perfil de Usuário</h2>
<img scr"https://github.com/gblcintra/sistema-de-reserva/blob/master/public/images/localhost_profiles.png" />
<h2>Tela de Pesquisa</h2>
<img scr"https://github.com/gblcintra/sistema-de-reserva/blob/master/public/images/localhost_search.png" />
<h2>Tela de Log</h2>
<img scr"https://github.com/gblcintra/sistema-de-reserva/blob/master/public/images/localhost_logs.png" />
