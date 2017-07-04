## PSR-4:自动加载器

### 1.概述
这PSR描述了规范自动加载从文件路径类。它是完全可互操作的，并且可以在除任何其他自动加载说明书，包括使用PSR-0 。这PSR还介绍了在哪里放置将根据规格自动载入的文件。


### 2.规格
- 1.术语“级”指的是类，接口，特点，以及其他类似的结构。
- 2.一个完全合格的类名具有以下形式：
   ```php
     \<NamespaceName>(\<SubNamespaceNames>)*\<ClassName>
   ```
    - 1.完全合格的类名必须有一个顶级命名空间的名字，也被称为“供应商命名空间”。
    - 2.完全合格的类名可能有一个或多个子命名空间名称。
    - 3.完全合格的类名必须终止类名称。
    - 4.有下划线的完全限定类名的任何部分没有任何特殊含义。
    - 5.在完全限定类名字母字符可以较低的情况下和上壳体的任何组合。
    - 6.所有的类名必须以大小写敏感的方式引用。
    
- 3.当加载对应于一个完全合格的类名称的文件

    - 1.一个连续系列的一个或多个引导命名空间和子名字空间的名称，不包括前导命名空间分隔，在完全限定类名（一个“命名空间前缀”）对应于至少一个“基本目录”。
    - 2.的“命名空间前缀”之后的连续的子名字空间名称对应于子目录“基本目录”，其中，所述命名空间隔板代表目录分隔符内。子目录名称必须与子命名空间名称的大小写。

- 4.该终端类名称对应于结尾的文件名.php。文件名必须匹配终端类名称的情况。
自动加载磁带机的实现必须不引发异常，绝不能提出任何级别的错误，不应该返回一个值。



### 3.例子
下表显示了一个给定的完全限定类名，命名空间前缀和基本目录中的相应文件路径。
```$xslt
FULLY QUALIFIED CLASS NAME	NAMESPACE PREFIX	BASE DIRECTORY	RESULTING FILE PATH
\Acme\Log\Writer\File_Writer	Acme\Log\Writer	./acme-log-writer/lib/	./acme-log-writer/lib/File_Writer.php
\Aura\Web\Response\Status	Aura\Web	/path/to/aura-web/src/	/path/to/aura-web/src/Response/Status.php
\Symfony\Core\Request	Symfony\Core	./vendor/Symfony/Core/	./vendor/Symfony/Core/Request.php
\Zend\Acl	Zend	/usr/includes/Zend/	/usr/includes/Zend/Acl.php
```
对于符合规范自动加载机的示例实现，请参阅示例文件。实施例的实现必须不能被视为本说明书的一部分，并且可以在任何时间改变。[examples file](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md).


### 附：
例子：

1.进入到当前目录

2.composer install

3.进入web server and view(或者直接执行cli,php src/Foo.php)
```bash
$ php -S 127.0.0.1:8081 -t ./
$ curl http://localhost:8081/src/Foo.php
```
output
```text
Doing work
```