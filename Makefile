list:
	@echo "ubuntu"
	@echo "evaengine-base"
	@echo "evaengine-v1.3.4"
ubuntu:
	docker build -t docker.wallstreetcn.com/ubuntu:14.04 ./ubuntu
	docker push docker.wallstreetcn.com/ubuntu:14.04
evaengine-base:
	docker build -t docker.wallstreetcn.com/evaengine/base	./evaengine/base
	docker push docker.wallstreetcn.com/evaengine/base
evaengine-v1.3.4:
	docker build -t docker.wallstreetcn.com/evaengine:v1.3.4 ./evaengine/v1.3.4
	docker push docker.wallstreetcn.com/evaengine:v1.3.4
