## 安装swoole并运行示例代码

### 前言  
相信不少同学看到swoole如此吊炸天，嗯，很有必要学一下，但学习swoole需要linux基础，建议同学们起码在ubuntu上搭建过lamp或lnmp，会简单使用vi，像我也搭建过lamp、lanp，还用ubuntu开发过php项目，但没有深入了解php的文件目录，按着swoole官方文档来安装了swoole，看到这句话：  
> 成功后，修改php.ini加入extension=swoole.so。通过php -m或phpinfo()来查看是否成功加载了swoole扩展。  
  
傻了，找了半天都不知道php.ini在哪里，找到php的路径，还发现/etc/php/apache2有php.ini,/etc/php/cli也有php.ini，究竟加到哪个php.ini,慢慢探索才发现原来加到cli目录下，`php -m` 成功了。  

### 笔记 
1. 下载releases版本的swoole  
下载地址:<https://github.com/swoole/swoole-src/releases>  
我下载了zip版，解压文件  
```

unzip swoole-src-swoole-x.x.x.zip

``` 

2. 编译安装  
使用phpize来生成php编译配置，./configure来做编译配置检测，make和make install来完成安装。  
```
cd swoole-src-swoole-x.x.x
phpize
./configure 
make && sudo make install
``` 

3. 成功后，修改php.ini加入extension=swoole.so  
```
cd /etc/php5/cli/
sudo vi php.ini
```
加入extension=swoole.so  
4. 通过php -m来查看是否成功加载了swoole扩展  

5. 运行示例代码  
**运行Server代码：** 
```
<?php
$serv = new swoole_server("127.0.0.1", 9501);
$serv->on('connect', function ($serv, $fd){
    echo "Client:Connect.\n";
});
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, 'Swoole: '.$data);
    $serv->close($fd);
});
$serv->on('close', function ($serv, $fd) {
    echo "Client: Close.\n";
});
$serv->start();
?>
```
**运行代码**，`php server.php`  
运行代码成功，可以使用`telnet 127.0.0.1 9501`来测试连接
具体测试可查看telnet命令如何使用。

**运行Client代码：**
```
<?php 
$client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);
//设置事件回调函数
$client->on("connect", function($cli) {
    $cli->send("hello world\n");
});
$client->on("receive", function($cli, $data){
    echo "Received: ".$data."\n";
});
$client->on("error", function($cli){
    echo "Connect failed\n";
});
$client->on("close", function($cli){
    echo "Connection close\n";
});
//发起网络连接
$client->connect('127.0.0.1', 9501, 0.5);
?>
```
**运行代码**，`php client.php`  
测试Client是否连接到服务端。
