#! /bin/bash

sudo touch /usr/bin/phpconsole
echo "node `pwd`/vendor/vegor/src/stout" > /usr/bin/phpconsole
echo 'PATH=/usr/bin/phpconsole' >> ~/.bash_profile
sudo chmod 777 /usr/bin/phpconsole
source ~/.bash_profile