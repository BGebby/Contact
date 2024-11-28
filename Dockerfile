# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Habilita módulos necesarios de PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia los archivos del proyecto
COPY ./src /var/www/html

# Asigna permisos
RUN chown -R www-data:www-data /var/www/html

# Habilita el módulo de reescritura en Apache
RUN a2enmod rewrite

# Expon el puerto 80
EXPOSE 80