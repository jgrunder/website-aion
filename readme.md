## Website : Aion private server

This is a of the [website](https://infinit.io/_/yD4R3n4.jpg) and the back-office [website](https://infinit.io/_/EXrLstD)

### Installation :

0. Execute : ```composer install``` on the project root

1. Create a ```.env``` file to the project root and edit database access for Game/Login/Website

```
APP_ENV			= local
APP_DEBUG		= false
APP_KEY			= H3vhkJ12XDwU7MQHfAY2yh7pucgndLZc

DB_HOST_GS		= localhost
DB_DATABASE_GS	= real_gs
DB_USERNAME_GS	= root
DB_PASSWORD_GS	= root

DB_HOST_LS		= localhost
DB_DATABASE_LS	= real_ls
DB_USERNAME_LS	= root
DB_PASSWORD_LS	= root

DB_HOST_WS		= localhost
DB_DATABASE_WS	= real_ws
DB_USERNAME_WS	= root
DB_PASSWORD_WS	= root

CACHE_DRIVER	= file
SESSION_DRIVER	= file
QUEUE_DRIVER	= sync

MAIL_DRIVER		= smtp
MAIL_HOST		= mailtrap.io
MAIL_PORT		= 2525
MAIL_USERNAME	= null
MAIL_PASSWORD	= null
```

2. You have a config files : ```config/aion.php```

3. Create a new database for the website (SQL : ```database/sql/database.ws.sql```)
4. Add a new column : shop_point(int) in account_data
5. Add a new column : pseudo(varchar:255) in account_data
6. Add a new column : vote(int) in account_data
7. Add a new column : email(varchar:255) in account_data
8. Add a new column : token(varchar:255) in account_data
9. Execute this SQL on your login database (SQL : ```database/sql/database.ls.sql)```
10. Execute this SQL on your game database (SQL : ```database/sql/database.gs.sql)```

### Apache :
The framework ships with a public/.htaccess file that is used to allow URLs without index.php. If you use Apache to serve your Laravel application, be sure to enable the mod_rewrite module.

If the .htaccess file that ships with Laravel does not work with your Apache installation, try this one:
```
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

### Nginx
On Nginx, the following directive in your site configuration will allow "pretty" URLs:
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```