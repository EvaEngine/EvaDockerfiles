FROM docker.cn/docker/ubuntu:14.04

ADD     sources.list.163 /etc/apt/sources.list
RUN	cat /etc/apt/sources.list
RUN	cp /usr/share/zoneinfo/Asia/Shanghai  /etc/localtime
RUN     apt-get update -y
RUN     apt-get upgrade -y
RUN	apt-get install -y	\
			unzip	\
			wget	\
			curl	\
			git	\
			git-core \
			httpie	\
			dialog
			
			
			
