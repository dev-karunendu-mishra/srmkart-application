<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Order;
use App\Models\PropertyEnquiry;
use App\Models\Assignment;
use App\Models\PrintOut;
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
        $orderNotificationCount = Order::where('status', 'pending')->count();
        $propertyNotificationCount = PropertyEnquiry::where('status', 'pending')->count();
        $assignmentNotificationCount = Assignment::where('status', 'pending')->count();
        $printOutNotificationCount = PrintOut::where('status', 'pending')->count();
        $notificationCount = $orderNotificationCount + $propertyNotificationCount + $assignmentNotificationCount + $printOutNotificationCount;
        $siteData = Setting::first();
        // $cartItems = Cart::content();
        // $cartItemsCount = Cart::count();
        // View::share('cartItemsCount', $cartItemsCount);
        // View::share('cartItems', $cartItems);

        View::share('categories', $categories);
        View::share('pages', $pages);
        View::share('siteData', $siteData);
        $pageClass = ['home' => 'home', 'about' => 'about-us', 'assignment' => 'assignment', 'printout' => 'PrintOut', 'contact' => 'contact-us'];
        View::share('pageClass', $pageClass);
        View::share('notificationCount',$notificationCount);
        View::share('orderNotificationCount',$orderNotificationCount);
        View::share('propertyNotificationCount',$propertyNotificationCount);
        View::share('assignmentNotificationCount',$assignmentNotificationCount);
        View::share('printOutNotificationCount',$printOutNotificationCount);
    }
}
