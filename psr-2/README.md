## PSR-2：编码风格指南

此导引件延伸并扩大PSR-1 ，基本编码标准。

本指南的目的是从不同的作者扫描码时减少认知摩擦。它通过列举一系列共同的规则，以及如何格式化PHP代码的期望这样做。

样式规则本文从共同点的各种构件项目中导出的。当不同的作者在多个项目中进行合作，它有助于有所有这些项目中要使用的一组准则。因此，本指南的好处是不是在规则本身，但在这些规则的共享。


### 1.概观
-   代码必须遵循“编码风格指南” PSR [PSR-1]()。
-   代码必须使用4个空格缩进，而不是<code>tabs</code>。
-   必须不存在上线长度有严格限制; 软限制必须是120个字符; 线应在80个字符或更少。
-   必须有一个后空行<code>namespace</code>声明，并且必须有块后一个空行```use```声明。
-   打开大括号类必须去的下一行，花括号必须走对身体的下一行。
-   打开大括号的方法必须去的下一行，花括号必须走对身体的下一行。
-   能见度必须在所有的属性和方法的声明; ```abstract```并且 ```final```必须能见度前宣布; ```static```知名度后必须申报。
-   控制结构的关键字必须有后他们一个空间; 方法和函数调用MUST NOT。
-   为控制结构开括号必须走在同一条线上，而右括号必须走对身体的下一行。
-   打开括号控制结构一定不能有空格之后他们，和右括号控制结构必须在此之前有一个空格。

#### 1.1例如
```php
<?php
namespace Vendor\Package;

use FooInterface;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class Foo extends Bar implements FooInterface
{
    public function sampleMethod($a, $b = null)
    {
        if ($a === $b) {
            bar();
        } elseif ($a > $b) {
            $foo->bar($arg1);
        } else {
            BazClass::bar($arg2, $arg3);
        }
    }

    final public static function bar()
    {
        // method body
    }
}
```

### 2.General

#### 2.1基本编码标准
代码必须遵循中列出的所有规则PSR-1

#### 2.2
- 所有PHP文件必须使用Unix的LF（换行）的行结束。
- 所有PHP文件必须以一个空行结束。
- 收盘```?>```标签必须从只包含PHP文件被省略。

#### 2.3
- 必须不存在上线长度的严格限制。
- 在线路长度的软限制必须是120个字符; 自动风格检查必须警告，但在软下限不得出错。
- 线路不应超过80个字符长; 长于线应分成的每个不超过80个字符的多个后续行。
- 必须不存在在非空行结束尾随空白。
- 空行可以被添加到提高可读性和指示的代码相关块。
- 不能有每行多个语句。

#### 2.4
- 代码必须使用4个空格缩进，不得使用标签来缩进。
>注：只使用空间，而不是与标签混和空间，有助于避免的diff，补丁，历史和注释的问题。使用的空间也可以很容易地插入精细的子缩进线间对准。

#### 2.5.Keywords and True/False/Null
- PHP 关键词必须是小写。
- PHP的常量true，false以及null必须是小写。


### 3.命名空间
如果存在，就必须有一个后空行namespace申报。

当目前所有use声明必须在后去namespace 申报。

必须有一个use每宣言关键字。

必须有一个后空行use块。

例如：
```php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

// ... additional PHP code ...
```

### 4.类，属性和方法
术语“级”指的是所有类，接口和特点。

#### 4.1extends和implements
在extends和implements关键字必须在同一行类名来声明。

该类必须继续自己的路线的左括号; 该类的右括号必须继续下去身体的下一行。
```php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements \ArrayAccess, \Countable
{
    // constants, properties, methods
}
```
其中每一后续行缩进一次进行分割。这样做时，在列表中的第一项必须在下一行，并且必须有每行只有一个接口。
```php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements
    \ArrayAccess,
    \Countable,
    \Serializable
{
    // constants, properties, methods
}
```

#### 4.2 属性
能见度必须在所有性能声明。

该```var```关键字不能被用于声明属性。

必须不存在每声明中宣布不止一个属性。

属性名称不应与指示保护的单下划线或私有可见作为前缀。

属性声明如下所示。
```php
<?php
namespace Vendor\Package;

class ClassName
{
    public $foo = null;
}
```

#### 4.3 方法
能见度必须在所有的方法声明。

方法名称不应与指示保护的单下划线或私有可见作为前缀。

方法名称不得与方法名称后的空间中声明。圆括弧必须继续自己的路线，和右括号必须继续下一行后的身体。必须没有左括号后的空间，必须不存在右括号前的空间。

方法声明如下所示。注意括号，逗号，空格和括号的位置：
```php
<?php
namespace Vendor\Package;

class ClassName
{
    public function fooBarBaz($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```
#### 4.4 方法参数

在参数列表，不能有每个逗号前的空间，而且必须有每个逗号后的一个空间。

使用默认值方法的参数必须走在参数列表的末尾。
```php
<?php
namespace Vendor\Package;

class ClassName
{
    public function foo($arg1, &$arg2, $arg3 = [])
    {
        // method body
    }
}
```

参数列表可以跨多个行，其中每一后续行缩进一次进行分割。这样做时，在列表中的第一项必须在下一行，并且必须有每行只有一个参数。

当参数列表跨越多行分割，右括号和开括号必须一起自己线放置在它们之间一个空间。
```php
<?php
namespace Vendor\Package;

class ClassName
{
    public function aVeryLongMethodName(
        ClassTypeHint $arg1,
        &$arg2,
        array $arg3 = []
    ) {
        // method body
    }
}
```

#### 4.5 abstract, final, and static
如果存在，abstract并final声明必须在能见度声明。

如果存在，static声明必须出现能见度声明之后。
```php
<?php
namespace Vendor\Package;

abstract class ClassName
{
    protected static $foo;

    abstract protected function zim();

    final public static function bar()
    {
        // method body
    }
}
```

#### 4.6 方法和函数调用

制备方法或函数调用时，必须不存在的方法或函数名和左括号之间的空间中，必须不存在左括号后的空间，并且必须不存在右括号前的空间。在参数列表，不能有每个逗号前的空间，而且必须有每个逗号后的一个空间。
```php
<?php
bar();
$foo->bar($arg1);
Foo::bar($arg2, $arg3);
```

参数列表可以跨多个行，其中每一后续行缩进一次进行分割。这样做时，在列表中的第一项必须在下一行，并且必须有每行只有一个参数。

```php
<?php
$foo->bar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
```


### 5 控制结构
是控制结构的通用样式规则如下：

- 必须有控制结构关键字后一个空间
- 必须没有左括号后的空间
- 必须不存在右括号前的空间
- 必须有右括号和左括号之间有一个空格
- 该结构体必须进行一次缩进
- 在大括号必须是对身体的下一行

每个结构的机构必须由括号括起来。这种标准化的结构怎么看，并减少在新行被添加到身体引入错误的可能性。
#### 5.1  if ,elseif,else

的if结构如下所示。注意括号，空格和括号的位置; 并且else和elseif都在同一行从早期身体右大括号。
```php
<?php
if ($expr1) {
    // if body
} elseif ($expr2) {
    // elseif body
} else {
    // else body;
}
```
关键字elseif应该被用来代替else if，这样所有的控制关键字看起来像单个的词。

#### 5.2 switch

一个switch结构如下所示。注意括号，空格和括号的位置。的case语句必须是从一次缩进switch和break关键字（或其它终端关键字）必须在相同的水平缩进case体。必须有这样一个评论 // no break时，下通是一个非空故意case体。
```php

<?php
switch ($expr) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}
```

#### 5.3 while

一个while声明如下所示。注意括号，空格和括号的位置。
```php

<?php
while ($expr) {
    // structure body
}
```

同样，do while声明如下所示。注意括号，空格和括号的位置。
```php
<?php
do {
    // structure body;
} while ($expr);
```
#### 5.4 for

一个for声明如下所示。注意括号，空格和括号的位置。
```php
<?php
for ($i = 0; $i < 10; $i++) {
    // for body
}
```

#### 5.5 的foreach

一个foreach声明如下所示。注意括号，空格和括号的位置。
```php
<?php
foreach ($iterable as $key => $value) {
    // foreach body
}
```

#### 5.6 try catch

一个try catch块如下所示。注意括号，空格和括号的位置。
```php
<?php
try {
    // try body
} catch (FirstExceptionType $e) {
    // catch body
} catch (OtherExceptionType $e) {
    // catch body
}
```

### 6.Closures
关闭装置必须与后一个空间被宣布function之前和后关键字，和空间use的关键字。

圆括弧必须走在同一条线上，而右括号必须继续下一行后的身体。

必须不存在的参数列表或变量列表的左括号后的空间，必须不存在的参数列表或变量列表的右括号之前的空间。

在参数列表和变量列表，不能有每个逗号前的空间，而且必须有每个逗号后的一个空间。

使用默认值封闭参数必须走在参数列表的末尾。

闭包的声明如下所示。注意括号，逗号，空格和括号的位置：
```php
<?php
$closureWithArgs = function ($arg1, $arg2) {
    // body
    echo $arg1 + $arg2;
    echo "\n";
};
$var1 = 1;
$var2 = 1000;
$closureWithArgsAndVars = function ($arg1, $arg2) use ($var1, $var2) {
    // body
    echo $arg1 + $arg2;
    echo "\n";
    echo $var1 + $var2;
};
$closureWithArgs(1, 2);
$var2 = 1;
$closureWithArgsAndVars(1, 2);
```
参数列表和变量列表可以跨多个行，其中每一后续行缩进一次进行分割。这样做时，在列表中的第一项必须在下一行，并且必须有每行只有一个参数或变量。

当结束列表（无论是自变量或变量）在多个行拆分，右括号和开括号必须一起自己线放置在它们之间一个空间。

以下是具有和不具有参数列表以及跨多个行拆分变量列出了封闭件的例子。

```php

<?php
$longArgs_noVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) {
    // body
};

$noArgs_longVars = function () use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
    // body
};

$longArgs_longVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
    // body
};

$longArgs_shortVars = function (
    $longArgument,
    $longerArgument,
    $muchLongerArgument
) use ($var1) {
    // body
};

$shortArgs_longVars = function ($arg) use (
    $longVar1,
    $longerVar2,
    $muchLongerVar3
) {
    // body
};
```

请注意，格式化规则时封盖在函数或方法调用作为参数直接使用同样适用。
```php
<?php
$foo->bar(
    $arg1,
    function ($arg2) use ($var1) {
        // body
    },
    $arg3
);
```

### 7.Conclusion

还有的风格和实践的许多元素本指南故意省略。这些措施包括但不限于：

- 全局变量和全局常量声明
- 函数声明
- Operators and assignment
- 跨线对齐
- 注释和文档块
- 类名的前缀和后缀
- Best practices

未来的建议可以修改和扩大这一指导解决这些或时尚与实践等元素。