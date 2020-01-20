#!/bin/sh

docker build -t cappasity-sdk -f ./Dockerfile-phpdoc .
docker run -dt -v $(pwd):/src --name cappasity-sdk cappasity-sdk
docker exec -it cappasity-sdk /bin/bash -c "cd /src && php /phpDocumentor.phar"
