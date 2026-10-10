<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\UserService;
use App\Services\ProductService;

try {
    // bagian user
    $userService = new UserService();
    $user = $userService->createUser('Rezki Firmansyah', 'rezki123@example.com');

    echo $userService->displayUser($user);
    echo "<hr>";

    // bagian product
    $productService = new ProductService();
    $product1 = $productService->createProduct('Laptop', 8500000);
    $product2 = $productService->createProduct('Mouse', 150000);

    echo $productService->displayProduct($product1);
    echo "<br><br>";
    echo $productService->displayProduct($product2);
} catch (Throwable $e) {
    echo "<h3>Terjadi Error</h3>";
    echo "<p>Pesan: " . $e->getMessage() . "</p>";
    echo "<p>File: " . $e->getFile() . "</p>";
    echo "<p>Line: " . $e->getLine() . "</p>";
}
