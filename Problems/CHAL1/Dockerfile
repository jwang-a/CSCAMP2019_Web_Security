# Origin image
FROM centos:latest

# Meta Information
MAINTAINER James Wang "b05902008@ntu.edu.tw"

# Setup Server Environment
RUN yum install -y \
    httpd \
    php \
    php-mysql \
    wget

RUN wget http://dev.mysql.com/get/mysql-community-release-el7-5.noarch.rpm
RUN rpm -ivh mysql-community-release-el7-5.noarch.rpm
RUN yum install -y mysql-community-server
RUN yum clean all;
RUN mysql_install_db --user=mysql --ldata=/var/lib/mysql

# add new user if it is needed
# RUN useradd -d /home/ctf/ -m -p ctf -s /bin/bash ctf
# RUN echo "ctf:ctf" | chpasswd

COPY index.php /var/www/html/
COPY main.css /var/www/html/
COPY css_sr/ /var/www/html/css_sr/
COPY probconf/ /tmp/probconf/

# Entry point
EXPOSE 80
CMD "/tmp/probconf/initproc.sh"

# ENTRYPOINT service apache2 start && /bin/bash
