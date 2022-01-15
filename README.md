# Prérequis
1. PHP 8
2. Composer
3. node (npm ou yarn)
# Instalation
1. clone la projet  taper la commande suivants :
```bash
$ git clone https://github.com/faby-dev/SymReact.git
```

2. Avoire tout le bundle :
```bash
$ composer install
```

3. Avoire touts les package js :
```bash
$ npm install ou yarn install
```
4. Configure la base de donnée modifier la ligne suivante:
```bash
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"
```
5. Créez la base de donnée tape cette ligne de commande:
```bash
$ bin/console d:d:c
```
6. Avoire tout les tables tape cetteligne de commande:
```bash
$ bin/console d:s:u -f
```
7. Lanche la Server php : 
```bash
$ php -S localhost:3000 -t public
```

7. Lanche la Server js : 
```bash
$ yarn encore dev server ou npm run dev
```