## RealAion


### Installation :

0. Execute : ```composer install``` on the project root

1. Create a ```.env``` file to the project root

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

4. Ajouter une collone : real(int) dans account_data
5. Ajouter une collone : pseudo(varchar:255) dans account_data
6. Ajouter une collone : vote(int) dans account_data
7. Ajouter une collone : email(varchar:255) dans account_data
8. Ajouter une collone : token(varchar:255) dans account_data
9. Créer une table account_votes dans la base de donnée du login (SQL : ```database/sql/database.ls.sql)```
10. Créer une table ladder_player dans la base de donnée du game (SQL : ```database/sql/database.gs.sql)```
11.  Après vous devez compiler le CSS / JS (Vous devez avoir NodeJS) :
```shell
npm i -g gulp
gulp style
gulp script
```

