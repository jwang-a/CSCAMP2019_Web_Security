chown -R mysql:mysql /var/lib/mysql /var/run/mysqld
mysqld_safe &	
sleep 10
mysql -u root -e "DROP DATABASE IF EXISTS lab4;"
mysql -u root -e "CREATE DATABASE lab4;"
#mysql -u root -e "DROP USER IF EXISTS 'lab4'@'localhost';"
mysql -u root -e "CREATE USER 'lab4'@'localhost' IDENTIFIED by 'M30Wworld';"
mysql -u root -e "GRANT SELECT ON lab4.* TO 'lab4'@'localhost';"
mysql -u root lab4 < /tmp/probconf/lab4.sql
/usr/sbin/httpd -D FOREGROUND
