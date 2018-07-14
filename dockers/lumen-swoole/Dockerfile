FROM zaherg/php72-swoole:latest
 
LABEL Maintainer="Pietro Iglio <igliop@gmail.com>"
 
ENV APP_ENV ${APP_ENV:-production}
ENV APP_DEBUG ${APP_DEBUG:-false}
ENV APP_TIMEZONE ${APP_TIMEZONE:-UTC}
ENV SWOOLE_HTTP_PORT ${SWOOLE_HTTP_PORT:-5000}
ENV SWOOLE_HTTP_HOST ${SWOOLE_HTTP_HOST:-"0.0.0.0"}

EXPOSE 5000  
 
USER root

RUN apk add --no-cache --virtual build-dependencies autoconf g++ make \
	&& pecl install apcu \\
	&& echo "extension=apcu.so" > /usr/local/etc/php/conf.d/apcu.ini \
	&& echo "apc.enable_cli=1" >> /usr/local/etc/php/conf.d/apcu.ini \
	&& apk del build-dependencies \
	&& rm -rf /tmp/* /usr/local/etc/php/conf.d/docker-php-ext-pdo_mysql.ini 

ADD ./ /var/www
CMD ["php", "artisan","swoole:http","start"]