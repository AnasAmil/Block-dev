<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/api/products')]
    public function index(ProductRepository $productRepository): JsonResponse
    {

        $products = $productRepository->findAll();
        return $this->json($products, 200, [], ['groups' => 'show_products']);

    }
}