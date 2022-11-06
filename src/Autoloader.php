<?php

class Autoloader {
	private static array $includePaths = [];
	private static string $basePath = '';

	public static function register($base_path = ''): void {
		self::$basePath = $base_path;
		spl_autoload_register([self::class, 'loadFromIncludePaths']);
	}
	private static function loadFromIncludePaths($class_name): void {
		$class_name = str_replace('\\', '/', $class_name);
		foreach (self::$includePaths as $path) {
			$path = self::$basePath . $path;
			if (include "$path/$class_name.php") return;
		}
	}
	public static function includePath(string|array $path): void {
		$path = (array)$path;
		self::$includePaths = array_merge(self::$includePaths, $path);
	}
}
