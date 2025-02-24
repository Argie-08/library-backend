FROM richarvey/nginx-php-fpm:latest

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV DB_CONNECTION pgsql
ENV DB_HOST dpg-ctt5ftjv2p9s738flrs0-a
ENV DB_PORT 5432
ENV DB_DATABASE library_backend_np8j
ENV DB_USERNAME library_backend_np8j_user
ENV DB_PASSWORD 1NUFVe5Uw0zK2DUvZtUt8P7AxMMe3RRH

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]