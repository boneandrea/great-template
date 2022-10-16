<?php

declare(strict_types=1);

namespace CustomBake;

use Cake\Console\CommandCollection;
use Cake\Core\BasePlugin;
use Cake\Core\ContainerInterface;
use Cake\Core\PluginApplicationInterface;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\RouteBuilder;

/**
 * Plugin for CustomBake.
 */
class Plugin extends BasePlugin
{
	/**
	 * Load all the plugin configuration and bootstrap logic.
	 *
	 * The host application is provided as an argument. This allows you to load
	 * additional plugin dependencies, or attach events.
	 *
	 * @param \Cake\Core\PluginApplicationInterface $app The host application
	 *
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 */
	public function bootstrap(PluginApplicationInterface $app): void
	{
	}

	/**
	 * Add routes for the plugin.
	 *
	 * If your plugin has many routes and you would like to isolate them into a separate file,
	 * you can create `$plugin/config/routes.php` and delete this method.
	 *
	 * @param \Cake\Routing\RouteBuilder $routes the route builder to update
	 */
	public function routes(RouteBuilder $routes): void
	{
		$routes->plugin(
			'CustomBake',
			['path' => '/custom-bake'],
			function (RouteBuilder $builder) {
				// Add custom routes here

				$builder->fallbacks();
			}
		);
		parent::routes($routes);
	}

	/**
	 * Add middleware for the plugin.
	 *
	 * @param \Cake\Http\MiddlewareQueue $middlewareQueue the middleware queue to update
	 */
	public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
	{
		// Add your middlewares here

		return $middlewareQueue;
	}

	/**
	 * Add commands for the plugin.
	 *
	 * @param \Cake\Console\CommandCollection $commands the command collection to update
	 */
	public function console(CommandCollection $commands): CommandCollection
	{
		// Add your commands here

		$commands = parent::console($commands);

		return $commands;
	}

	/**
	 * Register application container services.
	 *
	 * @param \Cake\Core\ContainerInterface $container the Container to update
	 *
	 * @see https://book.cakephp.org/4/en/development/dependency-injection.html#dependency-injection
	 *
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 */
	public function services(ContainerInterface $container): void
	{
		// Add your services here
	}
}
