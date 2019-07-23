chown -R mysql:mysql /var/lib/mysql /var/run/mysqld
mysqld_safe &	
sleep 10
mysql -u root -e "DROP DATABASE IF EXISTS chal1;"
mysql -u root -e "CREATE DATABASE chal1;"
#mysql -u root -e "DROP USER IF EXISTS 'chal1'@'localhost';"
mysql -u root -e "CREATE USER 'chal1'@'localhost' IDENTIFIED by 'M30Wworld';"
mysql -u root -e "GRANT ALL PRIVILEGES ON chal1.* TO 'chal1'@'localhost';"
mysql -u root chal1 < /tmp/probconf/chal1.sql
/usr/sbin/httpd -D FOREGROUND
