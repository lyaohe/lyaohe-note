## LAMP搭建 ubuntu12.04搭建Apache+php+mysql+phpmyadmin

`sudo apt-get install apache2`

`sudo /etc/init.d/apache2 start`

`sudo apt-get install libapache2-mod-php5 php5 php5-gd php5-mysql`

`sudo /etc/init.d/apache2 restart`

`sudo vi /var/www/test.php`


> 输入<?php phpinfo(); ?>

`sudo apt-get install mysql-server mysql-client`

`sudo apt-get install phpmyadmin`



> 在安装过程中会要求选择Web server：apache2或lighttpd，使用空格键选定apache2，按tab键然后确定。然后会要求输入设置的Mysql数据库密码。



> 然后将phpmyadmin与apache2建立连接，以我的为例：www目录在/var/www，phpmyadmin在/usr/share /phpmyadmin目录，所以就用命令：

`sudo ln -s /usr/share/phpmyadmin /var/www`

####phpmyadmin测试：  
在浏览器地址栏中打开`http://localhost/phpmyadmin`