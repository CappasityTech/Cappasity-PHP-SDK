#!/bin/sh

echo "[post-commit hook] Commit done!"

# Allows us to read user input below, assigns stdin to keyboard
exec < /dev/tty

while true; do
  read -p "[post-commit hook] Do you want to regenerate docs? (Y/n) " yn
  if [ "$yn" = "" ]; then
    yn='Y'
  fi
  case $yn in
      [Yy] ) composer run-script docs:generate; break;;
      [Nn] ) exit;;
      * ) echo "Please answer y or n for yes or no.";;
  esac
done

# Close STDIN
exec <&-
