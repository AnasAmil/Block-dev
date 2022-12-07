<?php

namespace App\Controller;

use App\Entity\Warehouse;
use App\Repository\WarehouseRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class WarehousesController extends AbstractController
{
    #[Route('/api/warehouses', name: 'app_warehouses', methods: ['GET'])]
    public function index(WarehouseRepository $warehouseRepository): JsonResponse
    {
        $warehouses = $warehouseRepository->findAll();
        return $this->json($warehouses, 200, [], ['groups' => 'show_warehouses']);
    }
}
