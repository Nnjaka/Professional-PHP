<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="conteiner">
        <div class="slider padding-site">
            <div class="header">
                <a href="index.html"><img src="img/logo.svg" alt="logo"></a>
                <div class="header_cart_link">
                    <a href="cart.php"><img src="img/cart.png" alt="cart" class="header_cart"></a>
                </div>
            </div>
            <div class="our-products-heaing">
                <p class="our-products">Catalog</p>
            </div>
        </div>
        <div class="content">
            <div class="products clearfix">
            </div>
            <div class="button-add-catalog">
                <button class="button-catalog">Get Products</button>
            </div>
            <div class="clr"></div>
        </div>
        <div class="footer">
            <div class="footer-heading">
                <div class="footer-contact">
                    <p class="contact">Contact Us</p>
                </div>
                <div class="footer-information">
                    <p class="information">Useful Information</p>
                </div>
                <div class="footer-stay clearfix">
                    <p class="stay">Let&rsquo;s Stay in&nbsp;Touch!</p>
                </div>
            </div>
            <div class="footer-text clearfix">
                <div class="footer-adress">
                    <p class="adress">132A Bridge Road Richmond VIC&nbsp;Australia.</p>
                    <br>
                    <p class="talk-to-us">Talk to&nbsp;us on&nbsp;1300&nbsp;132 `
                        <br>info@interior.com
                    </p>
                </div>
                <div class="footer-text-information">
                    <ul class="text-information">
                        <li class="text-information-list"><a href="#" class="text-information-link">Sales terms</a></li>
                        <li class="text-information-list"><a href="#" class="text-information-link">Customer care</a></li>
                        <li class="text-information-list"><a href="#" class="text-information-link">Delivery</a></li>
                    </ul>
                </div>
                <div class="footer-text-information2">
                    <ul class="text-information2">
                        <li class="text-information2-list"><a href="#" class="text-information-link">Architect accounts</a></li>
                        <li class="text-information2-list"><a href="#" class="text-information-link">Careers</a></li>
                        <li class="text-information2-list"><a href="#" class="text-information-link">Exchanges &amp;&nbsp;returns</a></li>
                    </ul>
                </div>
                <div class="footer-subcribe clearfix">
                    <p class="subcribe">Suscribe to&nbsp;know about our latest news, products and special offers just for suscribers.</p>
                    <div class="footer-email">
                        <input type="email" class="email" placeholder="your email address">
                        <input type="image" class="plane" src="img/plane.png" alt="plane">
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="copyright">
                    <p class="copy">&copy;&nbsp;Copyright&nbsp;&mdash; INTERIOR 2016. All Rights Reserved.</p>
                </div>
                <div class="social-network">
                    <a href="#"><img src="img/facebook.png" alt="facebook" class="icon icon-facebook"></a>
                    <a href="#"><img src="img/twitter.png" alt="twitter" class="icon icon-twitter"></a>
                    <a href="#"><img src="img/google.png" alt="google" class="icon icon-google"></a>
                    <a href="#"><img src="img/pinterest.png" alt="pinterest" class="icon icon-pinterest"></a>
                </div>
                <div class="footer-privacy">
                    <p class="privacy">Terms &amp;&nbsp;Conditions&nbsp;/ Privacy policy &amp;&nbsp;Cookies</p>
                </div>
            </div>
        </div>

        <script>
            // Получаем доступ к элементам разметки
            let divProducts = document.querySelector('.products');
            let buttonGetProducts = document.querySelector('.button-catalog');

            //Объявляем переменную-счетчик
            let quantityOfProducts = 0;

            //Функция для получения продуктов
            function getProducts() {
                let query = 'product.php?quantityOfProducts=' + quantityOfProducts;
                quantityOfProducts = quantityOfProducts + 6;

                fetch(query, {
                        'headers': {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json;charset=utf-8'
                        },
                        'method': 'GET'
                    })
                    .then((response) => {
                        return response.json();
                    })
                    .then((data) => {
                        divProducts.insertAdjacentHTML('beforeEnd', data['html'].join(''));
                    })

            }
            getProducts();

            //Вешаем обработчик событий
            buttonGetProducts.addEventListener('click', getProducts);
        </script>

</body>

</html>