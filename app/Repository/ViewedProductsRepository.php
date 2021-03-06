<?php

namespace App\Repository;

use App\Contracts\Repository\ViewedProductsRepositoryContract;
use App\Models\ViewedProduct;
use Illuminate\Database\Eloquent\Builder;

class ViewedProductsRepository implements ViewedProductsRepositoryContract
{
    public function create(array $attribute): ViewedProduct
    {
        return ViewedProduct::create($attribute);
    }

    public function allQuery(): Builder
    {
        return ViewedProduct::query();
    }

    public function chengeCutomerId($customerAuthId, $customerId)
    {
        $itemsCustomerAuth = ViewedProduct::where('customer_id', $customerAuthId)->get()->pluck('product_id');
        $items = ViewedProduct::where('customer_id', $customerId)->get();
        foreach ($items as $item) {
            if (!$itemsCustomerAuth->contains($item->product_id)) {
                $item->update(['customer_id' => $customerAuthId]);
            } else {
                $item->delete();
            }
        }
    }
}
