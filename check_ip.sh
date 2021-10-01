#!/bin/bash
function scaner {
ip route show | grep "^[0-9]" | awk '{print $3 " is ip addr" " -- " $1}'
}

if [[ $# -gt 0 ]]
then 
for i in $@ 
do scaner | grep -q $i 
if [[ $? -eq 0 ]]
then
scaner | grep  $i
else
for n in $i 
do echo "$n interface not found"
done
fi
done
else
scaner
fi
