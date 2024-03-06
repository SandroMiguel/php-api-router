<?php

/**
 * Router
 *
 * @package PhpApiRouter
 * @license MIT https://github.com/SandroMiguel/php-api-router/blob/main/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @link https://github.com/SandroMiguel/php-api-router
 * @version 1.0.0 (2024-03-06)
 */

declare(strict_types=1);

namespace PhpApiRouter;

/**
 * Managing API routes.
 */
final class Router
{
    /** @var array<array-key,Route> Array of routes. */
    private array $routes = [];

    /**
     * Adds a route to the router.
     *
     * @param Route $route The route to add.
     */
    public function addRoute(Route $route): void
    {
        $this->routes[] = $route;
    }

    /**
     * Execute the provided route.
     *
     * @param Route $route The route to execute.
     */
    public function executeRoute(Route $route): void
    {
        $controller = new $route->controller();

        if (!\method_exists($controller, $route->controllerMethod)) {
            throw new \RuntimeException(
                "Method '{$route->controllerMethod}' not found in controller '{$route->controller}'"
            );
        }

        $controller->{$route->controllerMethod}();
    }

    /**
     * Finds a matching route for the given URI and HTTP method.
     *
     * @param string $uri The URI of the request.
     * @param HttpMethod $httpMethod The HTTP method of the request.
     *
     * @return Route|null The matching route, or null if no match is found.
     */
    public function matchRoute(string $uri, HttpMethod $httpMethod): ?Route
    {
        foreach ($this->routes as $route) {
            if ($route->uri === $uri && $route->httpMethod === $httpMethod) {
                return $route;
            }
        }

        return null;
    }

    /**
     * Retrieves all registered routes.
     *
     * @return array<array-key,Route> Array of Route objects.
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
