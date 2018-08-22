USERNAME='root'
PASSWORD='root'
DBNAME='formation'
HOST='localhost'

COLLATE_DB='utf8mb4_unicode_ci'
ENCODAGE_DB='utf8mb4'

USER_USERNAME='tonprenom'
USER_PASSWORD='tonprenom'

# on supprime la base de données, puis on crée la base avec le bon encodage, on supprime le user associé à la base de données
# on recrée le user en lui associant tous les privilèges à la base de données 
MySQL=$(cat <<EOF
DROP DATABASE IF EXISTS $DBNAME;
CREATE DATABASE $DBNAME DEFAULT CHARACTER SET $ENCODAGE_DB COLLATE $COLLATE_DB;
DELETE FROM mysql.user WHERE user='$USER_USERNAME' and host='$USER_PASSWORD';
GRANT ALL PRIVILEGES ON $DBNAME.* to '$USER_USERNAME'@'$HOST' IDENTIFIED BY '$USER_PASSWORD' WITH GRANT OPTION;
EOF
)

# execute les commandes MySQL attention il vous faut les privilège root 
echo $MySQL | mysql --user=$USERNAME --password=$PASSWORD

#lancer les migrations Laravel
php artisan migrate:refresh --seed