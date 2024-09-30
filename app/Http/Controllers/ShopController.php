<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\DummyNode;
use App\Models\Product;
use App\Models\Store;
use App\Models\StoreProduct;
use App\Models\ProductTopping;
use App\Models\Topping;

class ShopController extends Controller
{


    public function storeMenu($id)
    {
        $store = Store::find($id);
        $stores = Store::all();
        $toppings = Topping::all();
        return view('products.show', compact('store', 'stores', 'toppings'));
    }

    function filter(Request $request)
    {
        $checkedToppings = $request->get('checkedToppings');
        $store_id = $request->get('store_id');
        $store = Store::find($store_id);

        if (!empty($checkedToppings)) {
            // Lọc ra các sản phẩm có tất cả các topping được chọn
            $products = $store->products()->whereHas('toppings', function ($query) use ($checkedToppings) {
                $query->whereIn('topping_id', $checkedToppings)
                    ->groupBy('product_id')
                    ->havingRaw('COUNT(topping_id) = ?', [count($checkedToppings)]);
            })->get();
        } else {
            $products = $store->products;
        }

        return response()->json(['view' => view('products.products', compact('products'))->render()]);
    }


    function sort(Request $request)
    {
        $sort = $request->get('sort');
        $store_id = $request->get('store_id');
        $store = Store::find($store_id);
        if (!empty($sort)) {
            $products = $store->products()->orderBy($sort)->get();
        } else {
            $products = $store->products;
        }
        return response()->json(['view' => view('products.products', compact('products'))->render()]);
    }
}
