#!/bin/bash

#Add privileges to user mysql
#GRANT ALL PRIVILEGES ON *.* TO 'proyecto'@'localhost' IDENTIFIED BY 'proyecto' WITH GRANT OPTION;
#GRANT ALL PRIVILEGES ON *.* TO 'proyecto'@'%' IDENTIFIED BY 'proyecto' WITH GRANT OPTION;
#FLUSH PRIVILEGES;

MYSQL_HOSTNAME="172.16.207.133"
MYSQL_USERNAME="proyecto" 
MYSQL_DATABASE="grupo56"

#uncomment next line
mysql -h $MYSQL_HOSTNAME -u $MYSQL_USERNAME -p $MYSQL_DATABASE < $1

