<?php
header('Content-Type: application/json');

$productInPage = 6;

//Подключение к БД
$link = mysqli_connect('localhost:3307', 'root', '', 'GB');

//Запрос к БД
if ($link) {
    $query = "SELECT * FROM products LIMIT " . $_GET['quantityOfProducts'] . "," . $productInPage . ";";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    };
    mysqli_close($link);
} else {
    die('Unable to connect to DB');
}

//Шаблон для вывода в верстке
$template = [];
foreach ($products as $product) {
    $template[] = "<div class=\"product\">
                <a target=\"_blanc\" class=\"product-image\"><img src=\"img/products/product-1.png\" class=\"section3-outline\"></a>
                    <div class=\"product-info\">
                        <div class=\"product-title\">" . $product['title'] . "</div>
                        <div class=\"product-price\">" . $product['price'] . "<span>$</span></div>
                    </div>
                </div>";
}

//Возвращаем данные в верстку
echo json_encode(array(
    'result'    => 'success',
    'html'      => $template
));
