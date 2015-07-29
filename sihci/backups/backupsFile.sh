#!/bin/bash

#Parameters
date=$(date +%Y-%m-%d-%H-%M)
NAME_FOLDER="files"
COPY_FOLDER="/home/sgeiadmi/public_html/sihci/sihci/users"
BACKUP_FOLDER="/home/sgeiadmi/public_html/sihci/sihci/backups/$NAME_FOLDER"

#Create folder for backups
mkdir -p $BACKUP_FOLDER

#Compare and Copy Folder users
#diff -rq $COPY_FOLDER $BACKUP_FOLDER
cp -au $COPY_FOLDER $BACKUP_FOLDER 