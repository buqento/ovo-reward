FROM php:7.1.2-apache 
RUN docker-php-ext-install pdo_mysql
RUN sed -i '/jessie-updates/d' /etc/apt/sources.list # Now archived
RUN apt update

RUN apt install -y \ 
    apt-transport-https \ 
    lsb-release \ 
    ca-certificates \ 
    wget \ 
    curl \ 
    nano \ 
    dialog \ 
    net-tools \
    git \
    sudo \
    openssl \
    libpcre3-dev

RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'

RUN apt update && apt install -y \
    php7.1-curl \
    php7.1-mbstring \
    php7.1-gettext \
    php7.1-gd \
    php7.1-fileinfo \
    php7.1-json \
    php7.1-mcrypt \
    php7.1-redis \
    php7.1-intl \
    php7.1-xml \
    php7.1-zip \
    php7.1-mysqli
ARG PHALCON_VERSION=3.4.4
ARG PHALCON_EXT_PATH=php7/64bits
RUN set -xe && \
        # Compile Phalcon
        curl -LO https://github.com/phalcon/cphalcon/archive/v${PHALCON_VERSION}.tar.gz && \
        tar xzf ${PWD}/v${PHALCON_VERSION}.tar.gz && \
        docker-php-ext-install -j $(getconf _NPROCESSORS_ONLN) ${PWD}/cphalcon-${PHALCON_VERSION}/build/${PHALCON_EXT_PATH} && \
        # Remove all temp files
        rm -r \
            ${PWD}/v${PHALCON_VERSION}.tar.gz \
            ${PWD}/cphalcon-${PHALCON_VERSION}
RUN a2enmod rewrite
