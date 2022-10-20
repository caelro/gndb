<?php

class Template {
  protected string $file_name;
  protected array $vars = [];

  public function __construct($name) {
    $this->file_name = PROJECT_ROOT . "/templates/$name.php";
  }

  public function __get(string $name): mixed {
    return $this->vars[$name];
  }

  public function __set(string $name, mixed $value): void {
    $this->vars[$name] = $value;
  }

	public function __isset(string $name): bool {
		return isset($this->vars[$name]);
	}

  public function __toString(): string {
    extract($this->vars); // extract our template variables ex: $value
    ob_start(); // store as internal buffer
    include $this->file_name;  // include the template into our file
    return ob_get_clean();
  }
}
