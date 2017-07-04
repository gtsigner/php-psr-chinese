<?php
/**
 * Created by IntelliJ IDEA.
 * User: zhaojunlike
 * Date: 7/4/2017
 * Time: 11:12 AM
 */


namespace PsrTest;


require "../vendor/autoload.php";

use Psr\Log\LoggerInterface;
use PsrTest\Impl\LogImpl;


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
    }
}
$foo = new Foo(new LogImpl());
$foo->doSomething();