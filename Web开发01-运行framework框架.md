## Web开发01-运行framework框架

### 前言
一开始看到Swoole和SwooleFramework,我觉得有点混乱，我按着自己的理解，整理它们分别是什么。
Swoole是一个php扩展，php是基于C语言开发出来的脚本语言，php很多类和函数都是基于C语言编写，编译成一个dll文件，这些dll提供php类和函数，这就是php扩展，是phper顶尖的开发之一。
framework是基于swoole扩展的高级开发框架，基于该框架能快速开发后端程序，据官方文档了解，该框架除了Web方面的应用之外，还可以开发更广泛的后端程序。

### 笔记
1. 用github把framework克隆下来
`git clone https://github.com/swoole/framework.git`
2. 运行该框架  
```
cd framework\examples
php app_server.php
```
运行成功后，可浏览器访问：`localhost：8888`