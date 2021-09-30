#!/bin/bash
if [[ $# -ge 1 ]]
then
for gumar in $@
do 
if [[ $gumar == ?(-)+([0-9]) ]]
then
all=$(( $all + $gumar ))
else
echo "$gumar is a string"
fi
shift
done
echo $all
else
echo "please add arguments"
fi
