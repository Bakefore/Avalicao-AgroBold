<?php
	require 'vendor/autoload.php';
	require 'routes.php';

	$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
	$method = $_SERVER['REQUEST_METHOD'];

	// Função para combinar rotas com parâmetros
	function matchRoute($route, $uri, &$params) {
		$routeParts = explode('/', $route);
		$uriParts = explode('/', $uri);

		if (count($routeParts) !== count($uriParts)) {
			return false;
		}

		foreach ($routeParts as $key => $routePart) {
			if (strpos($routePart, '{') === 0 && strpos($routePart, '}') === strlen($routePart) - 1) {
				$paramName = substr($routePart, 1, -1);
				$params[$paramName] = $uriParts[$key];
			} elseif ($routePart !== $uriParts[$key]) {
				return false;
			}
		}
		return true;
	}

	$matched = false;
	if (isset($routes[$method])) {
		foreach ($routes[$method] as $route => $callback) {
			$params = [];
			if (matchRoute($route, $uri, $params)) {
				call_user_func($callback, $params);
				$matched = true;
				break;
			}
		}
	}

	if (!$matched) {
		require 'src/view/404.php';
	}
?>