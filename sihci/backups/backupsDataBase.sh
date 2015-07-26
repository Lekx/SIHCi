#!/bin/bash

#Add important datas dir location, password, etc 

date=$(date +%d-%m-%Y-%H:%M)
NAME_DATABASE="sihci"
MYSQL_USER="root"
MYSQL_PASSWORD="000"
NAME_FOLDER="dataBase"
HOST="127.0.0.1"
BACKUP_FOLDER="/var/www/html/SIHCi/sihci/backups/$NAME_FOLDER"

#Create Folder from backups
mkdir -p $BACKUP_FOLDER

mysqldump --force --opt  -u${MYSQL_USER} -h${HOST} -p${MYSQL_PASSWORD} $NAME_DATABASE > "$BACKUP_FOLDER/${date}.sql"



