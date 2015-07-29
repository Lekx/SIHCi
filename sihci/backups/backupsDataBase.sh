#!/bin/bash

#Add important datas dir location, password, etc 

date=$(date +%d-%m-%Y-%H:%M)
NAME_DATABASE="sgeiadmi_sihci"
MYSQL_USER="sgeiadmi_sihci"
MYSQL_PASSWORD="51HC15Y573M"
NAME_FOLDER="dataBase"
HOST="localhost"
BACKUP_FOLDER="/home/sgeiadmi/public_html/sihci/sihci/backups/$NAME_FOLDER"

#Create Folder from backups
mkdir -p $BACKUP_FOLDER
mysqldump --force --opt  -u${MYSQL_USER} -h${HOST} -p${MYSQL_PASSWORD} $NAME_DATABASE > "$BACKUP_FOLDER/${date}.sql"
