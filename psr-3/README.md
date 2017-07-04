## PSR-3:日志接口
该文件描述了记录库的通用接口。

其主要目标是让库接收Psr\Log\LoggerInterface 对象，并在一个简单而通用的方式写日志了。框架和CMS的具有自定义的需求可能扩展接口为自己的目的，但应保持与此文件相兼容。这确保了第三方库的应用程序使用，可以写入集中应用日志。

### 1.规范
#### 1.1基本信息

该```LoggerInterface```自曝八种方法来写日志八个 [RFC 5424]()倍的水平（调试，信息，通知，警告，错误，严重警告，紧急）。
第九方法，log，接受一个日志级别作为第一个参数。调用此方法与日志级别常量之一必须有相同的结果调用特定级别的方法。调用此方法不受此规范定义的级别必须抛出
```Psr\Log\InvalidArgumentException```如果实现不知道的水平。用户不应该使用自定义级别不肯定知道当前实现支持它。

#### 1.2消息

每方法接受字符串作为消息，或与一个对象 ```__toString()```的方法。实现者可能对传递的对象进行特殊处理。如果不是的话，执行者必须将它转换为字符串。
该消息可以包含占位符，其实现者可以与从上下文阵列的值替换。

占位符名称必须对应于上下文阵列中的键。

占位符名称必须与一个开括号进行分隔```{```和一个右括号```}```。必须不存在的分隔符和占位符名称之间的任何空白。

占位符名称应该只字符组成```A-Z，a-z， 0-9，```下划线_和句点.。使用的其它字符被保留用于占位符规范的未来改型。

实现者可以使用占位符来实现各种逃避策略和显示转换日志。用户不应该预先逃生占位符值，因为他们不能知道在哪个范围内的数据将显示。

以下是提供仅供参考占位符内插的示例实现：
```php
/**
 * Interpolates context values into the message placeholders.
 */
function interpolate($message, array $context = array())
{
    // build a replacement array with braces around the context keys
    $replace = array();
    foreach ($context as $key => $val) {
        // check that the value can be casted to string
        if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
            $replace['{' . $key . '}'] = $val;
        }
    }

    // interpolate replacement values into the message and return
    return strtr($message, $replace);
}

// a message with brace-delimited placeholder names
$message = "User {username} created";

// a context array of placeholder names => replacement values
$context = array('username' => 'bolivar');

// echoes "User bolivar created"
echo interpolate($message, $context);
```

#### 1.3上下文

每方法接受一个数组作为上下文数据。这意味着持有不字符串中的合身任何无关的信息。该阵列可以包含任何数据。实现者必须确保他们对待上下文数据尽可能多的宽容越好。在上下文中的给定值不得抛出一个异常，也没有提出任何PHP错误，警告或通知。
如果一个Exception对象在上下文数据传递，它必须是在 'exception'键。记录异常是一种常见的模式，这使得实现者从异常当日志后端支持它提取堆栈跟踪。实现者必须还是确认'exception' 键实际上是一个是Exception使用它是这样，因为它可能包含任何东西之前。

#### 1.4辅助类和接口

本Psr\Log\AbstractLogger类，可以实现LoggerInterface 通过扩展，并实现通用很容易log的方法。其他八个方法是将消息转发和背景它。
同样地，使用Psr\Log\LoggerTrait只需要你来实现通用的log方法。注意，由于性状无法实现的接口，在这种情况下，你还是要执行LoggerInterface。
在Psr\Log\NullLogger与接口一起提供。也可以通过该接口的用户可以用来提供回退“黑洞”的实施，如果没有记录器给他们。然而，有条件的记录可能是一个更好的方法，如果上下文数据的创建是昂贵的。
的Psr\Log\LoggerAwareInterface仅包含一个 setLogger(LoggerInterface $logger)方法，并且可以通过框架被用于自动丝任意实例用记录器。
该Psr\Log\LoggerAwareTrait特性可用于轻松地实现在任何类中的对应接口。通过它可以访问到$this->logger。
在Psr\Log\LogLevel此类包含八个日志级别常量。

### 2.包

描述的接口和类以及相关的异常类和测试套件来验证你的实现提供作为一部分 [PSR /日志包](https://packagist.org/packages/psr/log)。

Usage
```php
<?php

use Psr\Log\LoggerInterface;

class Foo
{
    private $logger;

    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function doSomething()
    {
        if ($this->logger) {
            $this->logger->info('Doing work');
        }

        // do something useful
    }
}
```


### 附：
例子：

1.进入到当前目录

2.composer install

3.进入web server and view
```bash
$ php -S 127.0.0.1:8081 -t ./
$ curl http://localhost:8081/test.php
```
output
```text
Doing work11
```
