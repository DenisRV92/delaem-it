<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ProductInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class ProductController extends Controller
{
    public function __construct(public ProductInterface $service)
    {

    }

    /**
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index()
    {
        try {
            return ProductResource::collection($this->service->getAll());
        } catch (Exception $e) {
            logger($e);
            return (new ProductResource(['error' => 'error']))
                ->response()
                ->setStatusCode(401);
        }
    }

    /**
     * @param ProductsRequest $request
     * @return JsonResponse
     */
    public function store(ProductsRequest $request)
    {
        try {
            $this->service->create($request);
            return (new ProductResource(['message' => 'The product was created successfully']))
                ->response()
                ->setStatusCode(200);
        } catch (Exception $e) {
            logger($e);
            return (new ProductResource(['error' => 'Error creating product']))
                ->response()
                ->setStatusCode(401);
        }
    }


    /**
     * @param ProductsRequest $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(ProductsRequest $request, Product $product)
    {
        try {
            $this->service->update($request, $product);
            return (new ProductResource(['message' => 'product response sent successfully']))
                ->response()
                ->setStatusCode(200);
        } catch (Exception $e) {
            logger($e);
            return (new ProductResource(['error' => 'error when updating product']))
                ->response()
                ->setStatusCode(401);
        }
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product)
    {
        try {
            $this->service->delete($product);
            return (new ProductResource(['message' => 'The product was successfully deleted']))
                ->response()
                ->setStatusCode(200);
        } catch (Exception $e) {
            logger($e);
            return (new ProductResource(['message' => 'Error delete product']))
                ->response()
                ->setStatusCode(400);
        }
    }

    /**
     * @return JsonResponse
     */
    public function sendEmail()
    {
        try {
            $this->service->sendEmail();
            return (new ProductResource(['message' => 'Message sent']))
                ->response()
                ->setStatusCode(200);
        } catch (Exception $e) {
            logger($e);
            return (new ProductResource(['message' => 'error when trying to send email']))
                ->response()
                ->setStatusCode(400);
        }
    }
}
