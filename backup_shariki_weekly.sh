#!/bin/bash

TODAY=`date '+%Y-%m-%d'`
TEMP_DIR=/var/www/shariki_backup/tmp

BACKUP_NAME="shariki"
DB_NAME="shariki"
DB_USER="shariki"
DB_PASS="P2j2X6d5"
SITE_PATH=.

cd /var/www/shariki/web

echo "Starting Backup $TODAY..."

mkdir $TEMP_DIR

mysqldump -u $DB_USER -p$DB_PASS $DB_NAME > $TEMP_DIR/database.sql

tar --exclude="updraft" -zcf $TEMP_DIR/files.tar.gz $SITE_PATH

tar -zcf /var/www/shariki_backup/backups/weekly/$BACKUP_NAME-$TODAY.tar.gz -C $TEMP_DIR .

rm -Rf $TEMP_DIR

echo "Backup Complete [$(du -sh /var/www/shariki_backup/backups/weekly/$BACKUP_NAME-$TODAY.tar.gz | awk '{print $1}')]"
