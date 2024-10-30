<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\BikeEnquiryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourseEnquiryController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FurnitureEnquiryController;
use App\Http\Controllers\InternshipEnquiryController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/placeOrder', [CheckoutController::class, 'checkout'])->name('place-order');
});

Route::prefix('/')->group(function () {
    Route::get('link', function () {
        Artisan::call('storage:link');
        $target = $_SERVER['DOCUMENT_ROOT'].'/uploads';
        $link = $_SERVER['DOCUMENT_ROOT'].'/storage/uploads';
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

    Route::get('course', [WebsiteController::class, 'getCoursePage'])->name('course');
    Route::get('course/{courseId}', [WebsiteController::class, 'getCourseDetailPage'])->name('course-detail');

    Route::get('internship', [WebsiteController::class, 'getInternshipPage'])->name('internship');
    Route::get('internship/{internshipId}', [WebsiteController::class, 'getInternshipDetailPage'])->name('internship-detail');

    Route::get('properties/{id}/enquiry', [WebsiteController::class, 'placePropertyEnquiry'])->name('property-enquiry');
    Route::get('internship/{id}/enquiry', [WebsiteController::class, 'placeInternshipEnquiry'])->name('internship-enquiry');
    Route::get('course/{id}/enquiry', [WebsiteController::class, 'placeCourseEnquiry'])->name('course-enquiry');

    // Route::get('printout', function () {
    //     return view('default.printout');
    // })->name('printout');

    // Route::get('assignment', function () {
    //     return view('default.assignment');
    // })->name('assignment');

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
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('order', function () {
        return view('default.order');
    });

    Route::resource('assignment', AssignmentController::class)->only([
        'index',
        'store',
    ])->names([
        'index' => 'assignment',
        'store' => 'assignment.store',
    ]);

    Route::resource('printout', PrintOutController::class)->only([
        'index',
        'store',
    ])->names([
        'index' => 'printout',
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

    Route::resource('internship-enquiry', InternshipEnquiryController::class)->only([
        'store',
    ])->names([
        'store' => 'internship-enquiry.store',
    ]);

    Route::resource('course-enquiry', CourseEnquiryController::class)->only([
        'store',
    ])->names([
        'store' => 'course-enquiry.store',
    ]);

    Route::get('thankyou', function () {
        // Retrieve order and product data from session
        $order = session('order');

        // Ensure that the session variables are available
        if (! $order) {
            return redirect('/'); // Redirect to homepage or another page if data isn't found
        }

        return view('default.order', compact('order'));
    })->name('thankyou');
    Route::post('addToCart', [CartController::class, 'addToCartProduct']);
    Route::post('removeFromCart', [CartController::class, 'removeFromCart']);
    Route::post('clearCart', [CartController::class, 'removeFromCart']);
    Route::post('updateCart', [CartController::class, 'updateQuantity']);
    Route::get('categories/{category}', [WebsiteController::class, 'getCategoryData']);
    Route::get('{page}', [WebsiteController::class, 'getPage']);
});
