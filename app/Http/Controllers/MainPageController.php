<?php

namespace App\Http\Controllers;

use App\Contracts\Service\Product\HotOfferServiceContract;
use App\Contracts\Service\Product\ProductDiscountServiceContract;
use App\Http\Requests\CatalogGetRequest;
use App\Contracts\Repository\ProductRepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class MainPageController extends Controller
{
    public function index(
        ProductRepositoryContract      $products,
        CatalogGetRequest              $request,
        ProductDiscountServiceContract $discountsService,
        HotOfferServiceContract         $hotOfferService,
    ): Factory|View|Application
    {
        $topProducts = $products->getTopProducts();
        $dayOfferProduct = $products->getDayOfferProduct();
        $limitedEditionProduct = $products->getLimitedEditionProduct($dayOfferProduct->id);
        $discounts = $discountsService->getCatalogDiscounts($topProducts);
        $limitedEditionDiscounts = $discountsService->getCatalogDiscounts($limitedEditionProduct);
        $dayOfferDiscount = $discountsService->getProductDiscounts($dayOfferProduct);
        $dayOfferTime = Carbon::tomorrow()->format('d.m.Y H:i');
        $hotOffers = $hotOfferService->get();

        return view('main')->with(compact(
                                        'topProducts',
                                        'discounts',
                                                   'request',
                                                   'dayOfferProduct',
                                                   'limitedEditionProduct',
                                                   'limitedEditionDiscounts',
                                                   'dayOfferDiscount',
                                                   'dayOfferTime',
                                                    'hotOffers',
                                                ));
    }
}
