# Origin image
FROM centos:latest

# Meta Information
MAINTAINER James Wang "b05902008@ntu.edu.tw"

# Setup Server Environment
RUN yum install -y httpd

# add new user if it is needed
# RUN useradd -d /home/ctf/ -m -p ctf -s /bin/bash ctf
# RUN echo "ctf:ctf" | chpasswd
COPY index.html /var/www/html/
COPY cats.html /var/www/html/
COPY main.css /var/www/html/
COPY css_sr/ /var/www/html/css_sr

# Entry point
EXPOSE 80
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]

# ENTRYPOINT service apache2 start && /bin/bash
