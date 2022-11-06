<?php

class Template {
  protected string $file_name;
  protected array $vars = [];

  public function __construct($name) {
    $this->file_name = PROJECT_ROOT . "/templates/$name.php";
  }

	public function set(array $values): static {
		$this->vars = $values;
		return $this;
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

	public function e(string $str): string {
		return htmlspecialchars($str);
	}

	public static function render(string $name, array $data = []): string {
		return (new static($name))->set($data);
	}

	public function getSelectOptions(string $table, string $value_column_name, $current_value = null, $params = null): string {
		//todo: определённо эту функу надо переделать так, чтобы первым параметром она получала не имя таблицы, а массив строк, полученный из модели
		//todo: скажем так, модель должна дать данные, а html должен формироваться на их основе где-то во вьюхе, можно там сделать метод (частично сделал уже)
		$result = '';
		foreach (get_table($table) as $row) {
			$result .= "<option ";
			$result .= "value=\"{$row['id']}\" ";
			if (!is_null($params)) {
				foreach ($params as $p_key => $p_val) {
					$result .= "$p_key=\"$row[$p_val]\" ";
				}
			}
			if ($row['id'] == $current_value) $result .= " selected";
			$result .= ">" . $row[$value_column_name];
			$result .= "</option>\n";
		}
		return $result;
	}

  public function __toString(): string {
    extract($this->vars); // extract our template variables ex: $value
    ob_start(); // store as internal buffer
    include $this->file_name;  // include the template into our file
    return ob_get_clean();
  }
}
