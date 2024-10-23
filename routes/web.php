<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\BikeEnquiryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FurnitureEnquiryController;
use App\Http\Controllers\PrintOutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyEnquiryController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/')->group(function () {
    Route::get('link', function () {
        Artisan::call('storage:link');
        $target = $_SERVER['DOCUMENT_ROOT'].'/uploads';
        $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage/uploads';
        // Check if the symlink or directory already exists
        // Check if the symlink or directory already exists
        // Function to recursively delete a directory and its contents
        function deleteDirectory($dir)
        {
            if (! is_dir($dir)) {
                return false;
            }

            $items = array_diff(scandir($dir), ['.', '..']);

            foreach ($items as $item) {
                $path = $dir.DIRECTORY_SEPARATOR.$item;
                if (is_dir($path)) {
                    deleteDirectory($path);
                } else {
                    unlink($path);
                }
            }

            return rmdir($dir);
        }

        // Check if the symlink or directory already exists
        if (is_link($link)) {
            // If it's a symlink, remove it
            unlink($link);
        } elseif (is_dir($link)) {
            // If it's a directory, recursively delete it
            deleteDirectory($link);
        }
        // Create the new symlink
        symlink($target, $link);

        return 'Symlink created successfully!';
    });
    Route::get('', [WebsiteController::class, 'index'])->name('home');

    Route::get('about-us', function () {
        return view('default.about');
    })->name('about');

    Route::get('foods', [WebsiteController::class, 'getFoodPage'])->name('foods');
    Route::get('foods/{foodId}', [WebsiteController::class, 'getFoodDetailPage'])->name('food-detail');

    Route::get('rent-for-property', [WebsiteController::class, 'getPropertyPage'])->name('property');
    Route::get('properties/{propertyId}', [WebsiteController::class, 'getPropertyDetailPage'])->name('property-detail');

    Route::get('rent-bike', [WebsiteController::class, 'getBikePage'])->name('bike');
    Route::get('bikes/{bikeId}', [WebsiteController::class, 'getBikeDetailPage'])->name('bike-detail');

    Route::get('furniture', [WebsiteController::class, 'getFurniturePage'])->name('furniture');
    Route::get('furnitures/{furnitureId}', [WebsiteController::class, 'getFurnitureDetailPage'])->name('furniture-detail');

    Route::get('properties/{id}/enquiry', [WebsiteController::class, 'placePropertyEnquiry'])->name('property-enquiry');
    Route::get('furniture/{id}/enquiry', [WebsiteController::class, 'placeFurnitureEnquiry'])->name('furniture-enquiry');
    Route::get('bikes/{id}/enquiry', [WebsiteController::class, 'placeBikeEnquiry'])->name('bike-enquiry');

    Route::get('printout', function () {
        return view('default.printout');
    })->name('printout');

    Route::get('assignment', function () {
        return view('default.assignment');
    })->name('assignment');

    // Route::get('contact', function () { return view('default.contact'); });
    // ->name('contact.create');

    // Route::post('contact', [WebsiteController::class,'submitEnquiry'])->name('contact.store');

    Route::resource('contact-us', EnquiryController::class)->names([
        'index' => 'contact',
        'create' => 'contact.create',
        'store' => 'contact.store',
        'show' => 'contact.show',
        'edit' => 'contact.edit',
        'update' => 'contact.update',
        'destroy' => 'contact.destroy',
    ]);

    // Route::get('categories', [CategoryController::class,'getCategories']);
    // Route::resource('products', ProductController::class);

    Route::get('shop', function () {
        return view('template-one.shop');
    });

    Route::get('products/{product}', [WebsiteController::class, 'getProductData']);

    Route::get('cart', [CartController::class, 'index'])->name('cart');

    Route::get('checkout', function () {
        return view('default.checkout');
    });

    Route::resource('assignment', AssignmentController::class)->only([
        'store',
    ])->names([
        'store' => 'assignment.store',
    ]);

    Route::resource('printout', PrintOutController::class)->only([
        'store',
    ])->names([
        'store' => 'printout.store',
    ]);

    Route::resource('property-enquiry', PropertyEnquiryController::class)->only([
        'store',
    ])->names([
        'store' => 'property-enquiry.store',
    ]);

    Route::resource('bike-enquiry', BikeEnquiryController::class)->only([
        'store',
    ])->names([
        'store' => 'bike-enquiry.store',
    ]);

    Route::resource('furniture-enquiry', FurnitureEnquiryController::class)->only([
        'store',
    ])->names([
        'store' => 'furniture-enquiry.store',
    ]);

    Route::post('addToCart', [CartController::class, 'addToCartProduct']);
    Route::post('removeFromCart', [CartController::class, 'removeFromCart']);
    Route::post('clearCart', [CartController::class, 'removeFromCart']);
    Route::post('updateCart', [CartController::class, 'removeFromCart']);
    Route::get('categories/{category}', [WebsiteController::class, 'getCategoryData']);
    Route::get('{page}', [WebsiteController::class, 'getPage']);
});
