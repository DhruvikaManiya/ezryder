<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Category;
use App\product;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Stripe\Product as StripeProduct;

class EcommerceController extends Controller
{
    //
    public function home($store_type_id)
    {

        $stores = Store::where('store_type_id', $store_type_id)->paginate(3);
        $categories = Category::where('store_type_id', $store_type_id)->paginate(3);
        $products = product::where('store_type_id', $store_type_id)->paginate(2);

        $data = [
            'stores' => $stores,
            'categories' => $categories,
            'products' => $products
        ];

        return view('mobile.users.ecommerce.home', compact('data'));
    }

    public function storeDetail($store_id)
    {

        $store = Store::with('products')->with('time')->find($store_id);
        $categories = Category::where('store_type_id', $store->store_type_id)->get();

        return view('mobile.users.ecommerce.storepage', compact('store', 'categories'));
    }

    // search
    public function search()
    {
        return view('mobile.users.ecommerce.search');
    }
    // searchresult
    public function searchresult(Request $request)
    {
        $result = Store::where('name', 'like', '%' . $request->search . '%')->get();
        return response()->json($result);
    }

    public function addWishlist(Request $request)
    {
        $wishlist =  new Wishlist;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->product_id = $request->product_id;
        $wishlist->save();

        return response()->json(['success' => true, 'wishlist' => $wishlist]);
    }

    // storelist
    public function storelist($category_id = null)
    {
        if ($category_id == null) {
            $stores = Store::paginate(10);
            $title = 'All Stores';
        } else {

            $category =  Category::select('name')->where('id', $category_id)->first();
            $protductId = Category::find($category_id)->product->pluck('id');
            $stores = Store::join('products', 'stores.id', '=', 'products.store_id')
                ->whereIn('products.id', $protductId)
                ->select('stores.*')
                ->distinct()
                ->get();
            $title = $category->name;
        }
        return view('mobile.users.ecommerce.storelist', compact('stores', 'title'));
    }

    // favourite
    public function favourite()
    {
        $products = product::join('wishlists', 'products.id', '=', 'wishlists.product_id')
            ->where('wishlists.user_id', Auth::user()->id)
            ->select('products.*')
            ->get();

        return view('mobile.users.ecommerce.favourite', compact('products'));
    }
}
