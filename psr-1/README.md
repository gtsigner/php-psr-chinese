### PSR-1：基本编码标准

标准的该部分包括什么应该被认为是必需的，以确保共享PHP代码之间的互操作性的技术的高级标准编码的元素.

关键词“必须”，“不得”，“要求”，“应该”，“将不”，“应该”，“不应该”，“推荐”，“可以”和“可选”的文档中如描述被解释RFC 2119.

概观
文件必须只使用<?php和<?=标签.
文件必须只使用UTF-8无BOM的PHP代码.
文件应该任一声明的符号（类，函数，常量等） 或引起副作用（例如产生的输出，修改的.ini设置，等等），但是不应该这样做既.
命名空间和类必须遵循一个“自动加载” PSR：PSR-0 ，PSR-4 ].
类名必须在声明StudlyCaps.
类常量必须与下划线分隔符所有大写声明.
方法名称必须声明camelCase.
档
#### 2.1.PHP代码

PHP代码必须使用长<?php ?>标签或短回声<?= ?>标签; 一定不要用其他标签的变化.

#### 2.2.字符编码

PHP代码必须只使用UTF-8无BOM.

#### 2.3.副作用

的文件应该声明新符号（类，函数，常量等）和不引起其它副作用，或它应该执行与副作用逻辑，但不应一举两得.

短语“副作用”是指逻辑没有直接关系的声明的类，函数，常量等，执行仅仅从包括文件.

“副作用”包括但不限于：产生输出，明确使用的require或include，连接到外部服务，修改INI设置，发出错误或异常，修改全局或静态变量，读取或写入文件，等等.

以下是与双方的声明和副作用的文件的一个例子; 即，如何避免一个例子：

```
<?php
// side effect: change ini settings
ini_set('error_reporting', E_ALL);

// side effect: loads a file
include "file.php";

// side effect: generates output
echo "<html>\n";

// declaration
function foo()
{
    // function body
}
```
下面的例子是包含无副作用声明的文件; 即，什么效仿的例子：

```
<?php
// declaration
function foo()
{
    // function body
}

// conditional declaration is *not* a side effect
if (! function_exists('bar')) {
    function bar()
    {
        // function body
    }
}
```
### 2.命名空间和类名
命名空间和类必须遵循一个“自动加载” PSR：PSR-0 ，PSR-4 ].

这意味着每个类是在其本身的文件，并且是在至少一个水平的名称空间：一个顶级供应商名称.

类名必须在声明StudlyCaps.

代码PHP 5.3编写，并经过必须使用正式的命名空间.

例如：
```php
<?php
// PHP 5.3 and later:
namespace Vendor\Model;

class Foo
{
}
```
代码5.2.x书面和前应该使用的伪命名空间约定Vendor_前缀的类名.

```php
<?php
// PHP 5.2.x and earlier:
class Vendor_Model_Foo
{
}
```

### 3.类常量，属性和方法

术语“级”指的是所有类，接口和特点.

#### 4.1.常量

类常量必须与下划线分隔符所有大写声明.例如：
```
<?php
namespace Vendor\Model;

class Foo
{
    const VERSION = '1.0';
    const DATE_APPROVED = '2012-06-01';
}
```
#### 4.2.属性

本指南有意避免关于使用任何建议 $StudlyCaps，$camelCase或$under_score属性名称.

无论命名规范应该是一个合理的范围之内一贯性原则.该范围可以是供应商级，封装级，类级，或方法级.

#### 4.3.方法

方法名称必须声明camelCase().