<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

require_once '../vendor/autoload.php';

$loader = new FilesystemLoader('../templates');
$twig = new Environment($loader);

$imageID = $_GET['product_id'];

$link = mysqli_connect('localhost:3307', 'root', '', 'GB');
if ($link) {
    $query = "SELECT id, title, path, price FROM products WHERE id =" . $imageID . ";";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $product[] = $row;
    };
    mysqli_close($link);
} else {
    die('Unable to connect to DB');
}

try {
    $template = $twig->load('product.html.twig');
    echo $template->render([
        'product' => $product
    ]);
} catch (Exception $exeption) {
    echo $exeption->getMessage();
}
