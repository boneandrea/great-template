#!/bin/bash

cd `dirname $0`/..

# export WEB_PORT=3007 # if change
# export DB_PORT=3307 # if change
# export MAIL_PORT=8026 # if change

docker-compose build --no-cache
docker-compose up -d
docker-compose run --rm web composer install --no-interaction
docker-compose run --rm web bin/cake migrations migrate -p CakeDC/Users
docker-compose run --rm web bin/cake migrations migrate
docker-compose run --rm web bin/cake migrations seed --seed UsersSeed
docker-compose run --rm web bin/cake cache clear _cake_core_

# docker-compose run --rm web composer test
