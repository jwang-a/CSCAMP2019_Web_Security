chown -R mysql:mysql /var/lib/mysql /var/run/mysqld
mysqld_safe &	
sleep 10
mysql -u root -e "DROP DATABASE IF EXISTS chal5;"
mysql -u root -e "CREATE DATABASE chal5;"
#mysql -u root -e "DROP USER IF EXISTS 'chal1'@'localhost';"
mysql -u root -e "CREATE USER 'chal5'@'localhost' IDENTIFIED by 'M30Wworld';"
mysql -u root -e "GRANT SELECT ON chal5.* TO 'chal5'@'localhost';"
mysql -u root chal5 < /tmp/probconf/chal5.sql
/usr/sbin/httpd -D FOREGROUND
