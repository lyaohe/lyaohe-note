##在ubuntu14.04搭建LNMP+phpmyadmin
百度了好几篇教程都没有找到一篇最新的搭建教程，一开始出现502错误，解决了又空白页错误，折腾了好久才搞好，自己也记录一下搭建过程。


1. 更新安装源  
`sudo apt-get update`  

2.安装Nginx  
`sudo apt-get install nginx`  

3.启动Nginx  
`sudo /etc/init.d/nginx start`  
浏览器浏览运行情况输入：http://localhost ;如果看到”Welcome to nginx!”，表明你的 Nginx 服务器安装成功！  
关闭 Nginx：`sudo /etc/init.d/nginx stop`;  
重启 nginx：`sudo /etc/init.d/nginx restart`;  

4.安装php  
`sudo apt-get install php5-cli php5-cgi php5-fpm php5-mcrypt php5-mysql`  

5.配置Nginx站点，设置：  
`sudo vi /etc/nginx/sites-available/default`

修改 “index” 为：`index index.html index.htm index.php;`

修改 “root” 目录为： `root /var/www;`

找到以下内容，把对应的前面#注释去掉，其中`fastcgi_param  SCRIPT_FILENAME $document_root`是要添加的，若不添加，打开php网页都是空白页；  
参考如下：

	location ~ \.php$ {
	#       fastcgi_split_path_info ^(.+\.php)(/.+)$;
	        # NOTE: You should have "cgi.fix_pathinfo = 0;" in php.ini
	
	#       # With php5-cgi alone:
	#       fastcgi_pass 127.0.0.1:9000;
	#       # With php5-fpm:
	        fastcgi_pass unix:/var/run/php5-fpm.sock;
	        fastcgi_index index.php;
	        fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
	        include fastcgi_params;
	}

编辑test.php文件 
 
	<?php
		phpinfo();
	?>

访问`localhost/test.php`  

6.安装mysql  
`apt-get install mysql-server mysql-client`  
安装过程中会让你输入两次root帐户的密码。

7.安装phpmyadmin  
`sudo apt-get install phpmyadmin`  
安装过程中，会让你选择用apache还是lighttpd，既然两个都没装，就随便选一个。  
安装完成后，建立连接
`ln -s /usr/share/phpmyadmin /var/www`

### 补充
#### 虚拟主机
- 重定向301
-
 
	if ($host != 'www.lnmba.com')
	{
		rewrite ^/(.*) http://www.lnmba.com/$1 permanent;
	}
