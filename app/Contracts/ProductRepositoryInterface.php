<?php

namespace App\Contracts;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function getAll(): Collection;

    public function create(array $data): Product;

    public function update(Product $product, array $data): bool;

    public function delete(Product $product): bool;

}
