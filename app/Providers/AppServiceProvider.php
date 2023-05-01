<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProductType;
use App\Models\Cart;
//use Session;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(['layout.header', 'layout.page.loai_sanpham'] ,function($view){
            $loai_san_pham = ProductType::all();
            $view->with('loai_sp', $loai_san_pham);
        });
        view()->composer(['layout.header', 'layout.page.checkout', 'emails.interfaceEmailOrder', 'layout.page.list_cart'], function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
        });



    }
}
