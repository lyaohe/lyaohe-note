##邂逅Lazyrest

由于自己写过2-3个Restful API项目，觉得设计得很不好，搜索一些案例和框架，看看人家怎样设计，学着点嘛，主要还是想设计规范点。  

意外地在v2ex偶遇Lazyrest，虽然它托管到github不是很热，但看到使用教程，觉得设计得很好，决定clone下来学习学习。

跑起来发现有报错：
> Deprecated: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead

原来我的ubuntu14.04默认安装了php5.5，Lazyrest使用mysql_connect来写db函数库，5.5对mysql函数不是那么友好，提示会弃用，我看着这些提醒很不舒服，写了一个mysqli的库，也分享给大家。

###Lazyrest使用中还遇到两个问题
**总结一下给大家：**  
1.要配置好Rewrite规则，不然api怎样访问还是404
2.在linux下，应用目录下需要写权限，创建文件存储key/value，因为标准php环境下，没有KVDB，用了文件来存储。
