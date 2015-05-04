FROM    docker.wallstreetcn.com/ubuntu:14.04
# RUN	apt-get update -y

RUN	apt-get install -y \
	libcurl3 \
	libcurl3-dev \
	php5-fpm \
        php5-mysql \
        php5-curl \
        php5-gd \
        php5-intl \
        php5-mcrypt \
	php5-memcached \
	php5-redis \ 
	php5-gearman \
        php5-dev \
        libpcre3 \
        libpcre3-dev

# RUN 	curl -sS https://getcomposer.org/installer | php
RUN	curl -sS https://getcomposer.org/installer | php -- --install-dir=bin --filename=composer
# RUN 	mv composer.phar /usr/local/bin/composer


RUN     apt-get install -y nginx

RUN	apt-get install -y supervisor
RUN	apt-get install -y memcached redis-server
RUN     sudo apt-get install -y nodejs npm
RUN     ln -s /usr/bin/nodejs /usr/bin/node
RUN     npm install -g grunt-cli bower gulp cnpm less coffee typescript

ADD	etc/php5/fpm/php.ini	/etc/php5/fpm/php.ini
ADD	etc/php5/fpm/pool.d/www.conf	/etc/php5/fpm/pool.d/www.conf

ADD	etc/php5/cli/php.ini	/etc/php5/cli/php.ini
ADD     etc/nginx/nginx.conf      /etc/nginx/nginx.conf
ADD     etc/nginx/sites-enabled/default.conf    /etc/nginx/sites-enabled/
ADD     etc/supervisor  /etc/supervisor
RUN	mkdir /opt/log && mkdir /opt/log/nginx
ADD	opt/htdocs	/opt/htdocs
RUN	chown -R www-data.www-data /opt/htdocs /opt/log/


#CMD	php5-fpm --nodaemonize
#CMD	php5-fpm -i

EXPOSE 80
VOLUME ["/opt/htdocs/evaengine", "/opt/log"]

CMD     supervisord --nodaemon
