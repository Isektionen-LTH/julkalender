FROM alpine

RUN apk add --no-cache apache2 php7-apache2 yarn

# Set up apache
RUN sed -i "s/#LoadModule rewrite_module modules\/mod_rewrite.so/LoadModule rewrite_module modules\/mod_rewrite.so/" /etc/apache2/httpd.conf
RUN sed -i "s/#ServerName www.example.com:80/ServerName localhost:80/" /etc/apache2/httpd.conf
RUN sed -i "s/DocumentRoot \"\/var\/www\/localhost\/htdocs\"/DocumentRoot \"\/app\/src\"/" /etc/apache2/httpd.conf
RUN sed -i "s/<Directory \"\/var\/www\/localhost\/htdocs\">/<Directory \"\/app\/src\">/" /etc/apache2/httpd.conf
RUN sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/httpd.conf

# PHP config
RUN sed -i "s/display_errors = Off/display_errors = On/" /etc/php7/php.ini
RUN sed -i "s/error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT/error_reporting = E_ALL/" /etc/php7/php.ini

# Install the run script
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod 755 /entrypoint.sh

EXPOSE 80

CMD ["/entrypoint.sh"]
