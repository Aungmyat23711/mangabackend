<?php

namespace App\repositories;

use App\interfaces\ShopInterface;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShopRepository implements ShopInterface
{
    public function creatingShop($shop)
    {

        // try {
        if (!is_string($shop->logo)) {
            $logo = $shop->logo;
            $logoext = $logo->getClientOriginalExtension();
            $logophoto = time() . '.' . $logoext;
            $lpath = $logo->storeAs('public/logos', $logophoto);
            $logoUrl = asset(Storage::url($lpath));
        } else {
            $logoUrl = $shop->logo;
        }
        if (!is_string($shop->cover_image)) {
            $cover_image = $shop->cover_image;
            $cover_image_ext = $cover_image->getClientOriginalExtension();
            $cover_image_photo = time() . '.' . $cover_image_ext;
            $cpath = $cover_image->storeAs('public/logos/', $cover_image_photo);
            $coverUrl = asset(Storage::url($cpath));
        } else {
            $coverUrl = $shop->cover_image;
        }
        $data = new Shop();
        $data->logo = $logoUrl;
        $data->cover_image = $coverUrl;
        $data->shop_name = $shop->shop_name;
        $data->owner_name = $shop->owner_name;
        $data->status = "Active";
        $data->description = $shop->description;
        $data->account_holder_name = $shop->account_holder_name;
        $data->account_holder_email = $shop->account_holder_email;
        $data->bank_name = $shop->bank_name;
        $data->account_number = $shop->account_number;
        $data->country = $shop->country;
        $data->city = $shop->city;
        $data->state = $shop->state;
        $data->address = $shop->address;
        $data->phone = $shop->phone;
        $data->website = $shop->website;
        $data->save();
        return response(["data" => $data, "message" => "Shop Created Successfully", "status_code" => 200], 200);
        // } catch (\Throwable $th) {
        //     return response([
        //         "status" => "error",
        //         "message" => "Something went wrong",
        //         "status_code" => 500
        //     ], 500);
        // }
    }
    public function fetchingShop()
    {
        try {
            $data = Shop::when(request('shop_id'), function ($query) {
                $query->where('id', request('shop_id'));
            })->when(array(request('sortColumn'), request('sortDirection')), function ($query) {
                if (request('sortColumn')) {
                    //if request('sortColumn') is not null
                    $sortColumn = request('sortColumn');
                } else {
                    //else set default value
                    $sortColumn = "id";
                }
                if (request('sortDirection')) {
                    //if request('sortDirection') is not null
                    $sortDirection = request('sortDirection');
                } else {
                    //else set default value
                    $sortDirection = "asc";
                }
                $query->orderBy($sortColumn, $sortDirection);
            })->when(request('limit'), function ($query) {
                $query->limit(request('limit'));
            })->when(request('search'), function ($query) {
                $query->where('shop_name', 'like', '%' . request('search') . '%');
            })->paginate(5);
            return $data;
        } catch (\Throwable $th) {
            return response([
                "status" => "error",
                "message" => "Something went wrong",
                "status_code" => 500
            ], 500);
        }
    }
    public function fetchingShopName()
    {
        $data = DB::table('shops')->select('shop_name', 'logo')->get();
        return $data;
    }
}
