# Laravel6-mongo-application

<p align="center"><img src="cover.png"></p>

This repository was created for testing library https://github.com/jenssegers/laravel-mongodb
If you have to test something with library laravel-mongodb you can fork this repo (or mention me and i create branch)

- PHP >= 7.2
- Composer
- MongoDB

- ext-mongodb
```sh
sudo apt install php7.2 php7.2-common php7.2-cli php7.2-mongodb php-pear php7.2-dev
sudo pecl install mongodb
sudo bash
sudo echo "extension=mongodb.so" >> /etc/php/7.2/cli/php.ini
sudo echo "extension=mongodb.so" >> /etc/php/7.2/fpm/php.ini
sudo systemctl restart nginx.service
composer install && npm install && npm run dev

```


- [Installing](#installing)

- https://packagist.org/packages/jenssegers/mongodb
- https://pusher.com/signup
- http://dashboard.pusher.com/
- http://laravel.com/
- https://vuejs.org/


  - [Traefik](#traefik)

## Installing

Run `docker-compose up -d`

## Traefik

[Docs](https://docs.traefik.io/)

You can install traefik in separate docker container and add containers in docker-compose.yml to network which traefil uses(for example traefik_proxy)

Example of `docker-compose.yml` for traefik

```yml
version: '3.7'

services:
  traefik:
    container_name: traefik
    image: traefik:v2.0
    restart: always
    networks:
     - default
     - traefik_proxy
    command:
      - "--log.level=DEBUG"
      - "--providers.docker=true"
    volumes:
      - ./traefik.yml:/etc/traefik/traefik.yml
      - /var/run/docker.sock:/var/run/docker.sock
    ports:
      - "80:80"
      - "8080:8080"

networks:
  traefik_proxy:
    driver: bridge
    name: traefik_proxy

```
