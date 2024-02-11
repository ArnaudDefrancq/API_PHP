<?php

namespace CoursGrafikart\Router;


/**
 * represent a matched route
 */
class Route
{
    public function getName(): string
    {
    }

    /**
     *  
     *
     * @return callable
     */

    public function getCallback(): callable
    {
    }
    /**
     * get URL parameters
     *
     * @return array[]
     */
    public function getParameters(): array
    {
    }
}
