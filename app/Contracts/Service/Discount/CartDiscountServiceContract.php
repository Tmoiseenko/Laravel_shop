<?php

namespace App\Contracts\Service\Discount;

use App\Models\Customer;
use Illuminate\Support\Collection;

interface CartDiscountServiceContract
{
    public function getCartItemsDTOs(): Collection;
}