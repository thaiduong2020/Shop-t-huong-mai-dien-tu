<?php

namespace App\Providers;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('client.master',function($view){
            $user = Auth::user();

            $type = Categories::all();
            $res = [
                'type' => $type,
                'user' => $user,
            ];

            if(Session('Cart')){
                $oldCart = Session::get('Cart');
                $cart = new Cart($oldCart);
                $res['Cart']= Session::get('Cart');
                $res['product_cart'] = $cart->items;
                $res['totalPrice'] = $cart->totalPrice;
                $res['totalQty'] = $cart->totalQty;
            };
            $view->with($res);

        });
        view()->composer('client.check_out',function($view){
            $user = Auth::user();

            $type = Categories::all();
            $res = [
                'type' => $type,
                'user' => $user,
            ];

            if(Session('Cart')){
                $oldCart = Session::get('Cart');
                $cart = new Cart($oldCart);
                $res['Cart']= Session::get('Cart');
                $res['product_cart'] = $cart->items;
                $res['totalPrice'] = $cart->totalPrice;
                $res['totalQty'] = $cart->totalQty;
            };
            $view->with($res);

        });
    }
}
