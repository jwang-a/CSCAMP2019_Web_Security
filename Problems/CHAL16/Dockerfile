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
COPY dictionary/ /var/www/html/dictionary/
COPY stories/ /var/www/html/stories/
COPY main.css /var/www/html/
COPY css_sr/ /var/www/html/css_sr/
COPY secret/ /var/www/html/secret/
COPY robots.txt /var/www/html/
COPY sitemaps/ /var/www/html/sitemaps/


# Entry point
EXPOSE 80
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]

# ENTRYPOINT service apache2 start && /bin/bash
