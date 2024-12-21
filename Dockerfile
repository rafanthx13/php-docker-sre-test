# Usando a imagem oficial do PHP 8.0 com Apache
FROM php:8.0-apache

# Copiar arquivos do projeto para o contêiner
COPY public/ /var/www/html
COPY logs/ /var/log/php8-app/
COPY metrics/ /var/www/html/metrics
COPY tracing/ /var/www/html/tracing

# Configurar logs para stderr
RUN echo "error_log = /proc/self/fd/2" >> /usr/local/etc/php/php.ini

# Instalar dependências básicas (se necessário)
RUN apt-get update && \
    apt-get install -y libcurl4-openssl-dev && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# Expor a porta 80
EXPOSE 80

# Manter o Apache em primeiro plano
CMD ["apache2-foreground"]
