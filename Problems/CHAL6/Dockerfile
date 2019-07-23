# Origin image
FROM centos:latest

# Meta Information
MAINTAINER James Wang "b05902008@ntu.edu.tw"

# Setup Server Environment
RUN yum install -y \
    httpd \
    php \
    unzip \
    wget \
    centos-release-scl

RUN yum install -y https://dl.google.com/linux/direct/google-chrome-stable_current_x86_64.rpm
RUN CHROME_DRIVER_VERSION=`curl -sS chromedriver.storage.googleapis.com/LATEST_RELEASE`
RUN wget -N https://chromedriver.storage.googleapis.com/2.35/chromedriver_linux64.zip
RUN unzip chromedriver_linux64.zip
RUN mv chromedriver /usr/local/bin/chromedriver
RUN chown root:root /usr/local/bin/chromedriver
RUN chmod 755 /usr/local/bin/chromedriver

RUN yum install -y rh-python36
RUN ln -s /opt/rh/rh-python36/root/usr/bin/python3 /usr/local/bin/python3
RUN python3 -m pip install selenium==3.5

# add new user if it is needed
# RUN useradd -d /home/ctf/ -m -p ctf -s /bin/bash ctf
# RUN echo "ctf:ctf" | chpasswd
COPY index.php /var/www/html/
COPY adminview.php /var/www/html/
COPY main.css /var/www/html/
COPY css_sr/ /var/www/html/css_sr/
COPY admin.py /tmp/


# Entry point
EXPOSE 80
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]

# ENTRYPOINT service apache2 start && /bin/bash
