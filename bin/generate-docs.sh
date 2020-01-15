#!/bin/sh

docker build -t cappasity-sdk -f ./Dockerfile .
docker run -dt -v $(pwd):/src --name cappasity-sdk cappasity-sdk
docker exec -it cappasity-sdk "php phpDocumentor.phar -d /src/src -t /src/src/docs/api"
