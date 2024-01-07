#!/bin/bash

# Запуск контейнера Docker (если это часть вашего проекта)
export NAME=Author && docker run \
    -e MYSQL_ROOT_PASSWORD=root \
    -e MYSQL_DATABASE=${NAME} \
    -e MYSQL_USER=calabi \
    -e MYSQL_PASSWORD=1341 \
    --rm -d --name ${NAME} mysql:5.7

# Запуск Symfony приложения
symfony serve -d

# Дополнительные команды, если необходимо
# ...

