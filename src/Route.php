<?php

/**
 * Route
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
 * Represents a route in the API.
 */
final class Route
{
    /**
     * Constructor.
     *
     * @param string $uri The URI of the route.
     * @param HttpMethod $httpMethod The HTTP method of the route.
     * @param string $controller The controller associated with the route.
     * @param string $controllerMethod The method of the controller associated
     *  with the route.
     */
    public function __construct(
        public readonly string $uri,
        public readonly HttpMethod $httpMethod,
        public readonly string $controller,
        public readonly string $controllerMethod,
    ) {
    }
}
