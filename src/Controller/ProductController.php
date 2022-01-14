<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/{product_id}', name: 'product')]
    public function getProduct($product_id, ManagerRegistry $managerRegistry): Response
    {
        $manager = $managerRegistry->getRepository(Product::class);
        $product = $manager->find($product_id);
        var_dump($product->getTitle());
        die();
    }

    #[Route('/product', name: 'insert_product')]
    public function insertProduct(ManagerRegistry $managerRegistry): void
    {
        $manager = $managerRegistry->getManager();
        $image1 = new Image();
        $image1->setPath('path1');
        $image2 = new Image();
        $image2->setPath('path2');

        $product = new Product();
        $product->setTitle('Any title');
        $product->setDescription('Any description');
        $product->setPrice(50);
        $product->addImage($image1);
        $product->addImage($image2);
        $image1->setProduct($product);
        $image2->setProduct($product);

        $manager->persist($image1);
        $manager->persist($image2);
        $manager->persist($product);
        $manager->flush();
    }
}
