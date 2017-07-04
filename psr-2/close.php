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