FROM alpine:3.16
LABEL maintainer="sven@svenwal.de"
LABEL description="An example ticketing system"

# Setup apache and php
RUN apk --no-cache --update \
    add apache2 \
    apache2-ssl \
    curl \
    php8-apache2 \
    php8-bcmath \
    php8-bz2 \
    php8-calendar \
    php8-common \
    php8-ctype \
    php8-curl \
    php8-dom \
    php8-gd \
    php8-iconv \
    php8-mbstring \
    php8-mysqli \
    php8-mysqlnd \
    php8-openssl \
    php8-pdo_mysql \
    php8-pdo_pgsql \
    php8-pdo_sqlite \
    php8-phar \
    php8-session \
    php8-xml \
    && mkdir /htdocs

RUN chmod -R 777 /etc/apache2 && chmod -R 777 /etc/php8 && chmod -R 777 /var/www/logs && chmod -R 777 /etc/ssl/apache2/ && chmod -R 777 /run/apache2/

COPY . /htdocs

RUN chmod -R 777 /htdocs/post/data

EXPOSE 8080 8443

ADD docker-entrypoint.sh /

# HEALTHCHECK CMD wget -q --no-cache --spider localhost:8080

ENTRYPOINT ["/docker-entrypoint.sh"]
