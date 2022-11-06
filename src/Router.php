<?php

class Router {
	/** @var Route[] */ private static $routes = [];
	/** @var ?callable */ private static $notFoundAction = null;
	/** @var ?callable */ private static $methodNotAllowedAction = null;
	private static bool $caseSensitive = true;
	private static bool $trailingSlashSensitive = true;
	private static string $basePath = '';

	public static function add(string $methods, string $pattern, callable|array $action): void {
		self::$routes[] = new Route($methods, $pattern, $action);
	}
	public static function ifNotFound(callable $action): void {
		self::$notFoundAction = $action;
	}
	public static function ifMethodNotAllowed(callable $action): void {
		self::$methodNotAllowedAction = $action;
	}
	public static function ignoreCase(): void {
		self::$caseSensitive = false;
	}
	public static function ignoreTrailingSlash(): void {
		self::$trailingSlashSensitive = false;
	}
	public static function setBasePath(string $value): void {
		self::$basePath = $value;
	}

	public static function getResponse(): mixed {
		['path' => $path] = parse_url(urldecode($_SERVER['REQUEST_URI']));
		if (!str_starts_with($path, self::$basePath)) return null;
		$path = substr($path, strlen(self::$basePath));
		if (!self::$trailingSlashSensitive && $path !== '/') {
			$path = rtrim($path, '/');
		}
		$pattern_matched = false;
		$action = null;
		foreach (self::$routes as $route) {
			$pattern = '@^' . $route->pattern . '$@u' . (self::$caseSensitive ? '' : 'i');
			if (preg_match($pattern, $path, $args)) {
				$pattern_matched = true;
				$method = strtolower($_SERVER['REQUEST_METHOD']);
				if (str_contains($route->methods, $method)) {
					$action = $route->action;
					if (array_is_list($args)) {
						array_shift($args); // remove whole path match
					} else {
						$args = array_filter($args, 'is_string', ARRAY_FILTER_USE_KEY); // remain only named arguments
					}
					break;
				}
			}
		}
		if (!$action) {
			if ($pattern_matched) {
				$action = self::$methodNotAllowedAction;
				$args = [$path, $method];
			} else {
				$action = self::$notFoundAction;
				$args = [$path];
			}
		}
		if (!$action) return null;
		return is_callable($action) ? $action(...$args) : (new $action[0])->{$action[1]}(...$args);
	}
}

class Route {
	/** @param callable|array $action */
	public function __construct(
		public readonly string $methods,
		public readonly string $pattern,
		public readonly mixed $action
	) {}
}
