<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;   
    }

    #[Route('/api/products', name : 'products', methods: ['GET'])]
    public function index(): JsonResponse
    {

        $Allproducts = $this->productRepository->findAll();
        return $this->json($Allproducts, 200, [], ['groups' => 'show_products', 'groups' => 'show_warehouses']);

    }

    #[Route('/api/products/{id}', name : 'products_id', methods: ['GET'])]
    public function show($id): JsonResponse
    {

        $productsFoundByid = $this->productRepository->find($id);
        return $this->json($productsFoundByid, 200, [], ['groups' => 'show_products', 'groups' => 'show_warehouses']);
    }

}