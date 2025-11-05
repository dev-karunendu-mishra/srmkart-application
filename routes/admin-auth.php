<?php

use App\Http\Controllers\Admin\AssignmentController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\BikeController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CustomerEnquiryController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\FoodOrderController;
use App\Http\Controllers\Admin\FurnitureController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\InternshipController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PrintOutController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SellerListingController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware(['auth', 'verified'])->group(function () {

        Route::resource('categories', CategoryController::class)->names([
            'index' => 'categories',
            'create' => 'categories.create',
            'store' => 'categories.store',
            'show' => 'categories.show',
            'edit' => 'categories.edit',
            'update' => 'categories.update',
            'destroy' => 'categories.destroy',
        ]);

        Route::resource('brands', BrandController::class)->names([
            'index' => 'brands',
            'create' => 'brands.create',
            'store' => 'brands.store',
            'show' => 'brands.show',
            'edit' => 'brands.edit',
            'update' => 'brands.update',
            'destroy' => 'brands.destroy',
        ]);

        Route::resource('products', ProductController::class)->names([
            'index' => 'products',
            'create' => 'products.create',
            'store' => 'products.store',
            'show' => 'products.show',
            'edit' => 'products.edit',
            'update' => 'products.update',
            'destroy' => 'products.destroy',
        ]);

        Route::resource('/settings', SettingController::class)->names([
            'index' => 'settings',
            'create' => 'settings.create',
            'store' => 'settings.store',
            'show' => 'settings.show',
            'edit' => 'settings.edit',
            'update' => 'settings.update',
            'destroy' => 'settings.destroy',
        ]);

        Route::resource('/foods', FoodController::class)->names([
            'index' => 'foods',
            'create' => 'foods.create',
            'store' => 'foods.store',
            'show' => 'foods.show',
            'edit' => 'foods.edit',
            'update' => 'foods.update',
            'destroy' => 'foods.destroy',
        ]);

        Route::resource('/properties', PropertyController::class)->names([
            'index' => 'properties',
            'create' => 'properties.create',
            'store' => 'properties.store',
            'show' => 'properties.show',
            'edit' => 'properties.edit',
            'update' => 'properties.update',
            'destroy' => 'properties.destroy',
        ]);

        Route::resource('/furniture', FurnitureController::class)->names([
            'index' => 'furniture',
            'create' => 'furniture.create',
            'store' => 'furniture.store',
            'show' => 'furniture.show',
            'edit' => 'furniture.edit',
            'update' => 'furniture.update',
            'destroy' => 'furniture.destroy',
        ]);

        Route::resource('/bikes', BikeController::class)->names([
            'index' => 'bikes',
            'create' => 'bikes.create',
            'store' => 'bikes.store',
            'show' => 'bikes.show',
            'edit' => 'bikes.edit',
            'update' => 'bikes.update',
            'destroy' => 'bikes.destroy',
        ]);

        Route::resource('/courses', CourseController::class)->names([
            'index' => 'courses',
            'create' => 'courses.create',
            'store' => 'courses.store',
            'show' => 'courses.show',
            'edit' => 'courses.edit',
            'update' => 'courses.update',
            'destroy' => 'courses.destroy',
        ]);

        Route::resource('/internships', InternshipController::class)->names([
            'index' => 'internships',
            'create' => 'internships.create',
            'store' => 'internships.store',
            'show' => 'internships.show',
            'edit' => 'internships.edit',
            'update' => 'internships.update',
            'destroy' => 'internships.destroy',
        ]);

        Route::resource('/print_outs', PrintOutController::class)->names([
            'index' => 'print_outs',
            'create' => 'print_outs.create',
            'store' => 'print_outs.store',
            'show' => 'print_outs.show',
            'edit' => 'print_outs.edit',
            'update' => 'print_outs.update',
            'destroy' => 'print_outs.destroy',
        ]);
        Route::resource('/orders', OrderController::class);
        Route::resource('/seller_listings', SellerListingController::class)->names([
            'index' => 'seller_listings',
            'create' => 'seller_listings.create',
            'store' => 'seller_listings.store',
            'show' => 'seller_listings.show',
            'edit' => 'seller_listings.edit',
            'update' => 'seller_listings.update',
            'destroy' => 'seller_listings.destroy'
        ]);

        Route::resource('/assignments', AssignmentController::class)->names([
            'index' => 'assignments',
            'create' => 'assignments.create',
            'store' => 'assignments.store',
            'show' => 'assignments.show',
            'edit' => 'assignments.edit',
            'update' => 'assignments.update',
            'destroy' => 'assignments.destroy',
        ]);

        Route::resource('/food-orders', FoodOrderController::class)->names([
            'index' => 'food-orders',
            'create' => 'food-orders.create',
            'store' => 'food-orders.store',
            'show' => 'food-orders.show',
            'edit' => 'food-orders.edit',
            'update' => 'food-orders.update',
            'destroy' => 'food-orders.destroy',
        ]);

        Route::resource('clients', ClientController::class)->names([
            'index' => 'clients',
            'create' => 'clients.create',
            'store' => 'clients.store',
            'show' => 'clients.show',
            'edit' => 'clients.edit',
            'update' => 'clients.update',
            'destroy' => 'clients.destroy',
        ]);

        Route::resource('/testimonials', TestimonialController::class)->names([
            'index' => 'testimonials',
            'create' => 'testimonials.create',
            'store' => 'testimonials.store',
            'show' => 'testimonials.show',
            'edit' => 'testimonials.edit',
            'update' => 'testimonials.update',
            'destroy' => 'testimonials.destroy',
        ]);

        Route::resource('subscribers', SubscriberController::class)->names([
            'index' => 'subscribers',
            'create' => 'subscribers.create',
            'store' => 'subscribers.store',
            'show' => 'subscribers.show',
            'edit' => 'subscribers.edit',
            'update' => 'subscribers.update',
            'destroy' => 'subscribers.destroy',
        ]);

        Route::resource('/sliders', SliderController::class)->names([
            'index' => 'sliders',
            'create' => 'sliders.create',
            'store' => 'sliders.store',
            'show' => 'sliders.show',
            'edit' => 'sliders.edit',
            'update' => 'sliders.update',
            'destroy' => 'sliders.destroy',
        ]);

        Route::resource('/customer-enquiry', CustomerEnquiryController::class)->names([
            'index' => 'customer-enquiry',
            'create' => 'customer-enquiry.create',
            'store' => 'customer-enquiry.store',
            'show' => 'customer-enquiry.show',
            'edit' => 'customer-enquiry.edit',
            'update' => 'customer-enquiry.update',
            'destroy' => 'customer-enquiry.destroy',
        ]);

        // Route::get('/pages', [PageController::class, 'index'])->name('pages');
        // Route::get('/pages/{id}/edit', [PageController::class, 'edit'])->name('pages.edit');
        // Route::post('/pages', [PageController::class, 'store'])->name('pages.store');

        Route::resource('pages', PageController::class)->names([
            'index' => 'pages',
            'create' => 'pages.create',
            'store' => 'pages.store',
            'show' => 'pages.show',
            'edit' => 'pages.edit',
            'update' => 'pages.update',
            'destroy' => 'pages.destroy',
        ]);

        Route::resource('enquiries', EnquiryController::class)->names([
            'index' => 'enquiries',
            'create' => 'enquiries.create',
            'store' => 'enquiries.store',
            'show' => 'enquiries.show',
            'edit' => 'enquiries.edit',
            'update' => 'enquiries.update',
            'destroy' => 'enquiries.destroy',
        ]);

        Route::resource('blog-categories', BlogCategoryController::class)->names([
            'index' => 'blog-categories',
            'create' => 'blog-categories.create',
            'store' => 'blog-categories.store',
            'show' => 'blog-categories.show',
            'edit' => 'blog-categories.edit',
            'update' => 'blog-categories.update',
            'destroy' => 'blog-categories.destroy',
        ]);

        Route::resource('blogs', BlogController::class)->names([
            'index' => 'blogs',
            'create' => 'blogs.create',
            'store' => 'blogs.store',
            'show' => 'blogs.show',
            'edit' => 'blogs.edit',
            'update' => 'blogs.update',
            'destroy' => 'blogs.destroy',
        ]);

        Route::resource('catalogs', CatalogController::class)->names([
            'index' => 'catalogs',
            'create' => 'catalogs.create',
            'store' => 'catalogs.store',
            'show' => 'catalogs.show',
            'edit' => 'catalogs.edit',
            'update' => 'catalogs.update',
            'destroy' => 'catalogs.destroy',
        ]);

        Route::resource('services', ServiceController::class)->names([
            'index' => 'services',
            'create' => 'services.create',
            'store' => 'services.store',
            'show' => 'services.show',
            'edit' => 'services.edit',
            'update' => 'services.update',
            'destroy' => 'services.destroy',
        ]);

        Route::resource('industries', IndustryController::class)->names([
            'index' => 'industries',
            'create' => 'industries.create',
            'store' => 'industries.store',
            'show' => 'industries.show',
            'edit' => 'industries.edit',
            'update' => 'industries.update',
            'destroy' => 'industries.destroy',
        ]);

        Route::resource('packages', PackageController::class)->names([
            'index' => 'packages',
            'create' => 'packages.create',
            'store' => 'packages.store',
            'show' => 'packages.show',
            'edit' => 'packages.edit',
            'update' => 'packages.update',
            'destroy' => 'packages.destroy',
        ]);

        Route::resource('images', ImageController::class)->names([
            'index' => 'images',
            'create' => 'images.create',
            'store' => 'images.store',
            'show' => 'images.show',
            'edit' => 'images.edit',
            'update' => 'images.update',
            'destroy' => 'images.destroy',
        ]);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
