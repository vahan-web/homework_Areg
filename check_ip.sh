#!/bin/bash

function ip.addr {

#arr=(eno eth wlo)
for i in ${arr[*]}; do ip a | grep $i"[0-9]" |awk '{print $2}'| sed 'N;s/\n/ ip addr - /';done
}
arr=$*

ip.addr $arr
#echo $?
