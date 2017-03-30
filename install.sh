#! /bin/bash

sudo touch /usr/bin/phpconsole
sudo mkdir /usr/local/phpconsole
sudo cp -r `pwd`/vendor/vegor/phpconsole/* /usr/local/phpconsole/
echo "node /usr/local/phpconsole/src/stout.js" > /usr/bin/phpconsole
sudo chmod 777 /usr/bin/phpconsole

