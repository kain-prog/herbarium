<?php
define('ROOT', dirname(__DIR__)); // /var/www/html

spl_autoload_register(function($class){
    require ROOT . '/classes/' . $class . '.php';
});

// Pega o caminho da URL (ex.: "/colaborador" -> "colaborador")
$uri  = $_SERVER['REQUEST_URI'] ?? '/';
$path = trim(parse_url($uri, PHP_URL_PATH), '/');

// Se estiver em subpasta, remova aqui (ex.: $base = 'herbarium';)
$base = '';
if ($base !== '' && ($path === $base || str_starts_with($path, $base.'/'))) {
    $path = ltrim(substr($path, strlen($base)), '/');
}

$slug = $path === '' ? 'inicio' : strtolower(explode('/', $path)[0]);

$file = ROOT . '/pages/' . $slug . '/index.php';

if (is_file($file)) {
    require $file;
    exit;
}

http_response_code(404);
require ROOT . '/components/_head.php';
echo '<h1>404</h1><p>Página ' . htmlspecialchars($slug) . ' não encontrada.' . '</p>';
require ROOT . '/components/_footer.php';
