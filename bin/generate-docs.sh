#!/bin/sh

docker build -t cappasity-sdk -f ./Dockerfile .
docker run -it --volume . --name cappasity-sdk cappasity-sdk
docker exec -t cappasity-sdk "php phpDocumentor.phar -d /usr/src/sdk/src -t /usr/src/sdk/docs/api"
