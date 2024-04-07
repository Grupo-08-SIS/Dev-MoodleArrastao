# Use a imagem base do PHP Apache
FROM php:8.0-apache

# Defina o diretório de trabalho como /var/www/html
WORKDIR /var/www/html

# Atualize o sistema e instale as dependências necessárias
RUN apt-get update && \
    apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libicu-dev \
        libxml2-dev \
        libzip-dev \
        zlib1g-dev \
        unzip \
        git \
        nano \
        && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) \
        gd \
        intl \
        pdo_mysql \
        zip \
        mysqli

# Baixe e extraia o código-fonte do Moodle na pasta de trabalho
RUN git clone -b MOODLE_310_STABLE --single-branch https://github.com/moodle/moodle.git .

# Copie o arquivo de configuração personalizado para o Moodle
COPY config.php /var/www/html/config.php

# Copie o arquivo php.ini personalizado para substituir o php.ini padrão
COPY php.ini /usr/local/etc/php/php.ini

# Defina as permissões corretas para os diretórios do Moodle
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Crie o diretório moodledata e atribua as permissões corretas
RUN mkdir -p /var/www/moodledata \
    && chown -R www-data:www-data /var/www/moodledata \
    && chmod -R 777 /var/www/moodledata
        
# Ative o módulo de reescrita do Apache
RUN a2enmod rewrite

# Exponha a porta 80 para o Apache
EXPOSE 80

# Comando de inicialização do Apache
CMD ["apache2-foreground"]
