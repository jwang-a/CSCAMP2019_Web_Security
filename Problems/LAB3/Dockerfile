# Origin image
FROM centos:latest

# Meta Information
MAINTAINER James Wang "b05902008@ntu.edu.tw"

# Setup Server Environment
RUN yum install -y \
    httpd \
    php

# add new user if it is needed
# RUN useradd -d /home/ctf/ -m -p ctf -s /bin/bash ctf
# RUN echo "ctf:ctf" | chpasswd
COPY index.php /var/www/html/
COPY flag /var/www/

# Entry point
EXPOSE 80
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]

# ENTRYPOINT service apache2 start && /bin/bash
