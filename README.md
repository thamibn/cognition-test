## Installation instruction

Your server needs to have composer and node installed to be able to run the commands will follow shortly.
Please note for emails you need to have have a mailserver running and enter your details on the ``` .env ``` mail configuration section.

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=cognition@test.com
MAIL_FROM_NAME="${APP_NAME}"

```

### Steps

``` 
1. composer install 

2. npm install 

3. npm run dev or npm run watch 
```

configure database connection on ``` .env ``` file, make sure you create the database first recommended for this project on xampp phpmyadmin create an empty database call it cognition
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cognition
DB_USERNAME=root
DB_PASSWORD=
```
```
4. php artisan migrate --seed
```
```
5. php artisan run serve
```

### Login Details
```
email: support1@test.com or support2@test.com or support3@test.com
password: password

```
please contact thami @ 065 927 1587 for any help.




