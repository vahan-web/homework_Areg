#!/bin/bash
echo
while [ -n "$1" ]
do
case "$1" in
-m) "$(free -m)";;
-c) "$(lscpu)" ;;
-h) echo "use key -m or -c" ;;
*) echo "$1 is not an option" ;;
esac
shift
done
