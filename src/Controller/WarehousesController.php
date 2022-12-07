<?php

namespace App\Controller;

use App\Repository\WarehouseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class WarehousesController extends AbstractController
{
    #[Route('/api/warehouses', name: 'app_warehouses', methods: ['GET'])]
    public function index(WarehouseRepository $warehouseRepository): JsonResponse
    {
        $warehouses = $warehouseRepository->findAll();
        return $this->json($warehouses, 200, [], ['groups' => 'show_warehouses']);

    }
}
