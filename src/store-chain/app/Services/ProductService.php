<?php

use App\Models\Bill;
use App\Models\BoughtProduct;
use App\Models\Product;

class ProductService
{
    public function get(string $productNumber)
    {
        return Product::where('product_number', $productNumber)->first();
    }

    public function decreaseQuantity(Product $product, int $quantity)
    {
        try {
            $product->decrement('quantity', $quantity);
            if($product->quantity < 0) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $exception) {
            return false;
        }
    }

    public function checkType(string $name)
    {
        $product = Product::query()->where('name', $name)->first();
        if($product->type()->name == 'medicine' || $product->type()->name == 'parking ticket') {
            return true;
        } else {
            return false;
        }
    }

    public function boughtProduct(array $boughtProduct, Bill $bill)
    {
        $product = Product::where('name', $boughtProduct['name'])->first();

        if($this->decreaseQuantity($product, $boughtProduct['quantity'])) {
            return false;
        } else {
            $bill->products()->create([
                'product_id' => $product->id,
                'quantity' => $boughtProduct['quantity'],
                'price' => $product->price,
            ]);

            return true;
        }
    }
}
