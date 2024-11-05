<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\Food;
use App\Models\Furniture;
use App\Models\Internship;
use App\Models\Page;
use App\Models\Product;
use App\Models\Property;
use App\Models\Slider;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $foods = Food::limit(5)->get();
        $properties = Property::limit(5)->get();
        $internships = Internship::limit(5)->get();
        $courses = Course::limit(5)->get();

        return view('default.home', compact('sliders', 'foods', 'properties', 'internships', 'courses'));
    }

    public function getFoodPage(Request $request)
    {
        try {
            //$pageData = Food::where('url', $page)->first();
            $foods = Food::all();
            $pageTemplate = 'default.food';

            return view($pageTemplate, compact('foods'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getFoodDetailPage(Request $request, $foodId)
    {
        try {
            $detail = Food::where('id', $foodId)->orWhere('uuid', $foodId)->first();
            $showAddToCart = true;
            $serviceUrl = Route('foods');
            $serviceText = 'Food';
            $pageTemplate = 'default.product-detail';

            return view($pageTemplate, compact('detail', 'showAddToCart', 'serviceUrl', 'serviceText'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getPropertyPage(Request $request)
    {
        try {
            $records = Property::orderBy('location', 'desc')->get();
            $pageTemplate = 'default.property';

            return view($pageTemplate, compact('records'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getPropertyDetailPage(Request $request, $propertyId)
    {
        try {
            $detail = Property::where('uuid', $propertyId)->first();
            $showAddToCart = false;
            $serviceUrl = Route('property');
            $serviceText = 'Properties';
            $pageTemplate = 'default.product-detail';

            return view($pageTemplate, compact('detail', 'showAddToCart', 'serviceUrl', 'serviceText'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getFurniturePage(Request $request)
    {
        try {
            $records = Furniture::all();
            $pageTemplate = 'default.furniture';

            return view($pageTemplate, compact('records'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getFurnitureDetailPage(Request $request, $furnitureId)
    {
        try {
            $detail = Furniture::where('uuid', $furnitureId)->first();
            $showAddToCart = false;
            $serviceUrl = Route('furniture');
            $serviceText = 'Furniture';
            $pageTemplate = 'default.product-detail';

            return view($pageTemplate, compact('detail', 'showAddToCart', 'serviceUrl', 'serviceText'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getInternshipPage(Request $request)
    {
        try {
            $records = Internship::all();
            $pageTemplate = 'default.internship';

            return view($pageTemplate, compact('records'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getInternshipDetailPage(Request $request, $internshipId)
    {
        try {
            $detail = Internship::where('uuid', $internshipId)->first();
            $showAddToCart = false;
            $serviceUrl = Route('internship');
            $serviceText = 'Internship';
            $pageTemplate = 'default.product-detail';

            return view($pageTemplate, compact('detail', 'showAddToCart', 'serviceUrl', 'serviceText'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getBikePage(Request $request)
    {
        try {
            $records = Bike::all();
            $pageTemplate = 'default.bike';

            return view($pageTemplate, compact('records'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getBikeDetailPage(Request $request, $bikeId)
    {
        try {
            $detail = Bike::where('uuid', $bikeId)->first();
            $showAddToCart = false;
            $serviceUrl = Route('bikes');
            $serviceText = 'Bike';
            $pageTemplate = 'default.product-detail';

            return view($pageTemplate, compact('detail', 'showAddToCart', 'serviceUrl', 'serviceText'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getCoursePage(Request $request)
    {
        try {
            $records = Course::all();
            $pageTemplate = 'default.course';

            return view($pageTemplate, compact('records'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getCourseDetailPage(Request $request, $courseId)
    {
        try {
            $detail = Course::where('uuid', $courseId)->first();
            $showAddToCart = false;
            $serviceUrl = Route('course');
            $serviceText = 'Course';
            $pageTemplate = 'default.product-detail';

            return view($pageTemplate, compact('detail', 'showAddToCart', 'serviceUrl', 'serviceText'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getPage(Request $request, $page)
    {
        try {
            $pageData = Page::where('url', $page)->first();
            $template = 'default';
            $pageTemplate = $template.'.page';
            if (! $pageData) {
                $pageTemplate = 'default.error';
            }

            return view($pageTemplate, ['page' => $page, 'pageData' => $pageData]);
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getCategoryData(Request $request, $category)
    {
        try {
            $categoryData = Category::where('url', $category)->with(['products', 'images'])->withCount('products')->first();

            return view('template-one.shop', ['data' => $categoryData]);
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getProductData(Request $request, $product)
    {
        try {
            $productData = Product::where('id', $product)->with(['images'])->first();

            return view('template-one.productDetails', ['product' => $productData]);
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function placePropertyEnquiry(Request $request, $id)
    {
        try {
            $detail = Property::where('uuid', $id)->first();
            $formAction = Route('property-enquiry.store');
            $enquiryFor = ['service' => 'property_id', 'value' => $detail->id];

            return view('default.enquiry', compact('detail', 'formAction', 'enquiryFor'));

        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function placeFurnitureEnquiry(Request $request, $id)
    {
        try {
            $detail = Furniture::where('uuid', $id)->first();
            $formAction = Route('furniture-enquiry.store');
            $enquiryFor = ['service' => 'furniture_id', 'value' => $detail->id];

            return view('default.enquiry', compact('detail', 'formAction', 'enquiryFor'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function placeBikeEnquiry(Request $request, $id)
    {
        try {
            try {
                $detail = Bike::where('uuid', $id)->first();
                $formAction = Route('bike-enquiry.store');
                $enquiryFor = ['service' => 'bike_id', 'value' => $detail->id];

                return view('default.enquiry', compact('detail', 'formAction', 'enquiryFor'));
            } catch (\Throwable $th) {
                print_r($th->getMessage());
            }
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function placeInternshipEnquiry(Request $request, $id)
    {
        try {
            $detail = Internship::where('uuid', $id)->first();
            $formAction = Route('internship-enquiry.store');
            $enquiryFor = ['service' => 'internship_id', 'value' => $detail->id];

            return view('default.enquiry', compact('detail', 'formAction', 'enquiryFor'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function placeCourseEnquiry(Request $request, $id)
    {
        try {
            $detail = Course::where('uuid', $id)->first();
            $formAction = Route('course-enquiry.store');
            $enquiryFor = ['service' => 'course_id', 'value' => $detail->id];

            return view('default.enquiry', compact('detail', 'formAction', 'enquiryFor'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function submitEnquiry(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required', // max 2MB
            ]);

            // $enquiry = Enquiry::create($request->all());
            return redirect()->route('template-one.contact')->with('success', 'Enquiry created successfully!');
            //return redirect()->route('contact');
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }
}
