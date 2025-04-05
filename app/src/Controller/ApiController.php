<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class ApiController extends AbstractController
{
    #[Route('/items', name: 'get_items', methods: ['GET'])]
    public function getItems(): JsonResponse
    {
        // Dummy data for demonstration
        $items = [
            ['id' => 1, 'name' => 'Item 1', 'description' => 'Description for Item 1'],
            ['id' => 2, 'name' => 'Item 2', 'description' => 'Description for Item 2'],
            ['id' => 3, 'name' => 'Item 3', 'description' => 'Description for Item 3'],
        ];

        return $this->json([
            'success' => true,
            'data' => $items
        ]);
    }

    #[Route('/items/{id}', name: 'get_item', methods: ['GET'])]
    public function getItem(int $id): JsonResponse
    {
        // In a real app, you would fetch this from a database
        $item = ['id' => $id, 'name' => "Item $id", 'description' => "Description for Item $id"];

        return $this->json([
            'success' => true,
            'data' => $item
        ]);
    }

    #[Route('/items', name: 'create_item', methods: ['POST'])]
    public function createItem(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        // In a real app, you would validate and save to a database
        // For now, we'll just return the data back with a generated ID
        $newItem = [
            'id' => rand(100, 999),
            'name' => $data['name'] ?? 'New Item',
            'description' => $data['description'] ?? 'New description'
        ];

        return $this->json([
            'success' => true,
            'message' => 'Item created successfully',
            'data' => $newItem
        ], 201);
    }
}