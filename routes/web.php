<?php

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProfileController;
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
    Route::get('food', function () {
        return view('default.food');
    })->name('food');
    Route::get('rent-for-property', function () {
        return view('default.property');
    })->name('property');
    Route::get('rent-bike', function () {
        return view('default.bike');
    })->name('bike');
    Route::get('furniture', function () {
        return view('default.furniture');
    })->name('furniture');
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

    Route::get('cart', function () {
        return view('template-one.cart');
    });

    Route::get('checkout', function () {
        return view('template-one.checkout');
    });
    Route::get('categories/{category}', [WebsiteController::class, 'getCategoryData']);
    Route::get('{page}', [WebsiteController::class, 'getPage']);
});
