<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Setting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categories = Category::with(['images'])->withCount('products')->get();
        $pages = Page::all();
        $siteData = Setting::first();
        // $cartItems = Cart::instance('karunendu')->content();
        // $cartItemsCount = Cart::instance('karunendu')->count();
        // View::share('cartItemsCount', $cartItemsCount);
        // View::share('cartItems', $cartItems);

        View::share('categories', $categories);
        View::share('pages', $pages);
        View::share('siteData', $siteData);
        $pageClass = ['home' => 'home', 'about' => 'about-us', 'assignment' => 'assignment', 'printout' => 'PrintOut', 'contact' => 'contact-us'];
        View::share('pageClass', $pageClass);
    }
}
