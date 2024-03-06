<?php

declare(strict_types=1);

use PhpApiRouter\HttpMethod;
use PhpApiRouter\Route;
use PhpApiRouter\Router;
use PHPUnit\Framework\TestCase;

final class RouterTest extends TestCase
{
    /**
     * Test adding a route to the router.
     */
    public function testAddRoute(): void
    {
        $router = new Router();
        $route = new Route(
            '/users',
            HttpMethod::GET,
            'SomeClass',
            'getAllUsers'
        );

        $router->addRoute($route);
        $routes = $router->getRoutes();

        $this->assertCount(1, $routes);
        $this->assertSame($route, $routes[0]);
    }

    /**
     * Test matching a route for a given URI and HTTP method.
     */
    public function testMatchRoute(): void
    {
        $router = new Router();
        $route = new Route(
            '/users',
            HttpMethod::GET,
            'SomeClass',
            'getAllUsers'
        );

        $router->addRoute($route);
        $matchedRoute = $router->matchRoute('/users', HttpMethod::GET);

        $this->assertSame($route, $matchedRoute);
    }
}
