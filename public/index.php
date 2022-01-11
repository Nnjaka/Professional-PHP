<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

require_once '../vendor/autoload.php';

$loader = new FilesystemLoader('../templates');
$twig = new Environment($loader);

$link = mysqli_connect('localhost:3307', 'root', '', 'GB');
if ($link) {
    $query = "SELECT id, title, path, price FROM products;";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    };
    mysqli_close($link);
} else {
    die('Unable to connect to DB');
}

try {
    $template = $twig->load('index.html.twig');
    echo $template->render([
        'products' => $products
    ]);
} catch (Exception $exeption) {
    echo $exeption->getMessage();
}
