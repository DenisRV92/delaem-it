<?php

namespace App\Services;

use App\Contracts\ProductInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Http\Requests\ProductsRequest;
use App\Mail\TestMail;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class ProductService implements ProductInterface
{
    public function __construct(public ProductRepositoryInterface $productRepository)
    {

    }

    /**
     * @return Collection
     * @throws \Exception
     */
    public function getAll(): Collection
    {
        try {
            return $this->productRepository->getAll();
        } catch (\Exception $e) {
            throw $e;
        }

    }

    /**
     * @param ProductsRequest $request
     * @return Product
     * @throws \Exception
     */
    public function create(ProductsRequest $request): Product
    {
        try {
            return $this->productRepository->create($request->toArray());
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param ProductsRequest $request
     * @param Product $product
     * @return bool
     * @throws \Exception
     */
    public function update(ProductsRequest $request, Product $product): bool
    {
        try {
            $product->fill($request->toArray());
            return $this->productRepository->update($product, $product->toArray());

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param Product $product
     * @return bool
     * @throws \Exception
     */
    public function delete(Product $product): bool
    {
        try {
            return $this->productRepository->delete($product);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function sendEmail(): void
    {
        try {
            Mail::to(config('product.email'))->queue(new TestMail());
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
