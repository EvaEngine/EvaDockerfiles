FROM	docker.wallstreetcn.com/evaengine/base

ADD     phalcon-v1.3.4.zip /home/
RUN     cd /home && unzip phalcon-v1.3.4.zip
RUN     cd /home/cphalcon-phalcon-v1.3.4/build/safe && \
                phpize && \
                ./configure --enable-phalcon && \
                make && make install
RUN     echo "extension=phalcon.so" > /etc/php5/fpm/conf.d/phalcon.ini
RUN     echo "extension=phalcon.so" > /etc/php5/cli/conf.d/phalcon.ini
