<?php

namespace CoursGrafikart\Router;


/**
 * represent a matched route
 */
class Route
{

    private $name;
    private $callback;
    private $parameters;

    public function __construct(string $name, callable $callback, array $parameters)
    {
        $this->name = $name;
        $this->callback = $callback;
        $this->parameters = $parameters;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     *  
     *
     * @return callable
     */

    public function getCallback(): callable
    {
        return $this->callback;
    }
    /**
     * get URL parameters
     *
     * @return array[]
     */
    public function getParams(): array
    {
        return $this->parameters;
    }
}
