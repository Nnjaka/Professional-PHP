<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ProductController extends AbstractController
{
    #[Route('/product/{product_id}', name: 'product')]
    public function index($product_id, ManagerRegistry $managerRegistry): Response
    {
        $manager = $managerRegistry->getRepository(Product::class);
        $product = $manager->find($product_id);

        return $this->render('product/index.html.twig', [
            'product' => $product,
        ]);
    }
}
