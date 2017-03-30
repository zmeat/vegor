#! /bin/bash

sudo touch /usr/bin/phpconsole
sudo mkdir /usr/local/phpconsole
sudo cp `pwd`/vendor/vegor/src/stout.js /usr/local/phpconsole/stout.js
echo "node /usr/local/phpconsole/stout.js" > /usr/bin/phpconsole
sudo chmod 777 /usr/bin/phpconsole

