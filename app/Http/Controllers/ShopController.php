<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\interfaces\ShopInterface;

class ShopController extends Controller
{
    protected ShopInterface $shopInterface;
    public function __construct(ShopInterface $shopInterface)
    {
        $this->shopInterface = $shopInterface;
    }
    public function createShop(StoreShopRequest $request)
    {
        return $this->shopInterface->creatingShop($request);
    }
    public function fetchShop()
    {
        return $this->shopInterface->fetchingShop();
    }
    public function fetchShopName()
    {
        return $this->shopInterface->fetchingShopName();
    }
}
