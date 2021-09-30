#!/bin/bash
echo -e '\033[0;32m' "you chose $1 character password"
</dev/urandom tr -dc A-Za-z0-9'"!;#$%&()*+,-./:;<=>?@[]^_`{|}~' | head -c$1; echo
