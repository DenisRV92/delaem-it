<?php

namespace App\Contracts;

use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductInterface
{
    public function create(ProductsRequest $request): Product;

    public function update(ProductsRequest $request, Product $task): bool;

    public function getAll(): Collection;

    public function delete(Product $product): bool;

    public function sendEmail(): void;

}
