FROM    docker.wallstreetcn.com/ubuntu
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

RUN 	curl -sS https://getcomposer.org/installer | php
RUN 	mv composer.phar /usr/local/bin/composer

ADD	phalcon-v1.3.4.zip /home/ 
RUN	cd /home && unzip phalcon-v1.3.4.zip
RUN 	cd /home/cphalcon-phalcon-v1.3.4/build/safe && \ 
		phpize && \ 
		./configure --enable-phalcon && \
	 	make && make install
RUN 	echo "extension=phalcon.so" > /etc/php5/fpm/conf.d/phalcon.ini
RUN 	echo "extension=phalcon.so" > /etc/php5/cli/conf.d/phalcon.ini
RUN 	sudo apt-get install -y nodejs npm
RUN 	ln -s /usr/bin/nodejs /usr/bin/node
RUN 	npm install -g grunt-cli bower gulp

RUN     apt-get install -y nginx

RUN	apt-get install -y supervisor

ADD     etc/nginx/nginx.conf      /etc/nginx/nginx.conf
ADD     etc/nginx/sites-enabled/default.conf    /etc/nginx/sites-enabled/
ADD     etc/supervisor  /etc/supervisor
RUN	mkdir /opt/log && mkdir /opt/log/nginx
ADD	opt/htdocs	/opt/htdocs
RUN	chown -R www-data.www-data /opt/htdocs /opt/log/

EXPOSE	80

#CMD	php5-fpm --nodaemonize
#CMD	php5-fpm -i
CMD	supervisord --nodaemon
