#!/bin/bash
docker exec -it my-custom-nginx nginx -t > status
output=$(cat status | awk '{print $7}' | sed "s/is//" )
if [ $output=="successful" ]
then
echo "$(docker exec -it my-custom-nginx /etc/init.d/nginx reload)"
else 
echo "nginx syntax not corected"
cat status
fi
