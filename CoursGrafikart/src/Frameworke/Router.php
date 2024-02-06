<?php

namespace CoursGrafikart;

use Psr\Http\Message\RequestInterface;


/**
 * Register and match routes
 */
class Router
{
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
    }

    /**
     * Undocumented function
     *
     * @param RequestInterface $request
     * @return Route|null
     */
    public function match(RequestInterface $request): ?Route
    {
    }
}
