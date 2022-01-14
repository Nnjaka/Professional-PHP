<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/product/1');
        $this->assertResponseStatusCodeSame(200);
        $this->assertSelectorTextContains('h1.product-title', 'Product 1');
    }
}
