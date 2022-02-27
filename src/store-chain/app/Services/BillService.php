<?php

use App\Models\Bill;
use App\Models\Store;
use Illuminate\Http\Request;

class BillService
{
    private $storeService;

    private $productService;

    public function __construct(ProductService $productService, StoreService $storeService)
    {
        $this->productService = $productService;
        $this->storeService = $storeService;
    }

    public function create(Request $request)
    {
        try {
            $storeName = $request->get('store');
            $customerData = $request->get('customer_data');
            $boughtProducts = $request->get('products');
        } catch (Exception $exception) {
            return ['message' => $exception->getMessage(), 'status' => 'error'];
        }

        $this->storeService->set($storeName);
        $store = $this->storeService->get();
        $serial_number = $this->createSerialNumber($boughtProducts);
        $bill = $this->createBill($customerData, $store, $serial_number);
        foreach ($boughtProducts as $boughtProduct) {
            if(!$this->productService->BoughtProduct($boughtProduct, $bill)){
                $bill->forceDelete();
                return ['There is not enough quantity for ' . $boughtProduct['name'], 'status' => 'error'];
            }
        }
        return ['Bill created successfully', 'status' => 'success'];
    }

    public function createBill(array $customerData, Store $store, int $serial_number)
    {
        return Bill::create([
            'first_name' => $customerData['first_name'],
            'last_name' => $customerData['last_name'],
            'telephone_number' => $customerData['telephone_number'],
            'store_id' => $store->id,
            'serial_number' => $serial_number
        ]);
    }

    public function createSerialNumber(array $boughtProducts)
    {
        foreach ($boughtProducts as $product) {
            if($this->productService->checkType($product['name'])) {
                return rand(16, 16);
            }
        }
        return null;
    }
}
