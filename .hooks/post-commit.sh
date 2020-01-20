#!/bin/sh

read -p "Do you want to update API docs?" -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]
then
    sh ./bin/generate-docs.sh
fi
