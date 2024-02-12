<?php

namespace CoursGrafikart;

use CoursGrafikart\Router\Route;
use Psr\Http\Message\RequestInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\Route as ZendRoute;
use Zend\Expressive\Router\MiddlewareDecorator;

/**
 * Register and match routes
 */
class Router
{
    private $router;

    public function __construct()
    {
        $this->router = new FastRouteRouter();
    }
    /**
     * Undocumented function
     *
     * @param string $path
     * @param callable $collable
     * @param string $name
     * @return void
     */
    public function get(string $path, callable $collable, string $name)
    {
        $this->router->addRoute(new ZendRoute($path, $collable, ["GET"], $name));
    }

    /**
     * Undocumented function
     *
     * @param RequestInterface $request
     * @return Route|null
     */
    public function match(RequestInterface $request): ?Route
    {
        $result = $this->router->match($request);
        return new Route($result->getMatchedRouteName(), $result->getMatchedMiddleware(), $result->getMatchedParams());
    }
}
