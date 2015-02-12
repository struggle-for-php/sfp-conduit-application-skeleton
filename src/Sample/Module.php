<?php
namespace Sample;

class Module
{
    private $serviceManager;

    public function __construct($sm)
    {
        $this->serviceManager = $sm;
    }

    public function __invoke($req, $res, $next)
    {
        if ($req->getUri()->getPath() === '/') {
            return $res->end('Hello World');
        }

        return $next($req, $res);
    }
}
