#安装swoole并运行示例代码

**前言**  
相信不少同学看到swoole如此吊炸天，嗯，很有必要学一下，但学习swoole需要linux基础，建议同学们起码在linux上搭建过lamp或lnmp，会简单使用vi，像我也搭建过lamp、lanp，还用ubuntu开发过php项目，但没有深入了解php的文件目录，按着swoole官方文档来安装了swoole，看到这句话：  
> 成功后，修改php.ini加入extension=swoole.so。通过php -m或phpinfo()来查看是否成功加载了swoole扩展。  
傻了，找了半天都不知道php.ini在哪里，找到php的路径，还发现/etc/php/apache2有php.ini,/etc/php/cli也有php.ini，究竟加到哪个php.ini,慢慢探索才发现原来加到cli目录下，成功了。  

**笔记**  
1. 下载releases版本的swoole  
下载地址:<https://github.com/swoole/swoole-src/releases>  
我下载了zip版，解压文件  
`unzip swoole-src-swoole-x.x.x.zip`  

2.编译安装  
使用phpize来生成php编译配置，./configure来做编译配置检测，make和make install来完成安装。  
    cd swoole-src-swoole-x.x.x  
	phpize  
	./configure  
	make && sudo make install   


3.
