<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Food;
use App\Models\Furniture;
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
        $furnitures = Furniture::limit(5)->get();
        $bikes = Bike::limit(5)->get();

        return view('default.home', compact('sliders', 'foods', 'properties', 'furnitures', 'bikes'));
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
            $detail = Food::where('id', $foodId)->first();
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
            $records = Property::all();
            $pageTemplate = 'default.property';

            return view($pageTemplate, compact('records'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getPropertyDetailPage(Request $request, $propertyId)
    {
        try {
            $detail = Property::where('id', $propertyId)->first();
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
            $furnitures = Furniture::all();
            $pageTemplate = 'default.property';

            return view($pageTemplate, compact('furnitures'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getFurnitureDetailPage(Request $request, $furnitureId)
    {
        try {
            $detail = Furniture::where('id', $furnitureId)->first();
            $showAddToCart = false;
            $pageTemplate = 'default.product-detail';

            return view($pageTemplate, compact('detail', 'showAddToCart'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getBikePage(Request $request)
    {
        try {
            $bikes = Bike::all();
            $pageTemplate = 'default.property';

            return view($pageTemplate, compact('bikes'));
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getPage(Request $request, $page)
    {
        try {
            $pageData = Page::where('url', $page)->first();
            $template = 'template-one';
            $pageTemplate = $template.'.page';

            return view($pageTemplate, ['page' => $page, 'pageData' => $pageData]);
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }

    public function getBikeDetailPage(Request $request, $bikeId)
    {
        try {
            $detail = Bike::where('id', $bikeId)->first();
            $showAddToCart = false;
            $pageTemplate = 'default.product-detail';

            return view($pageTemplate, compact('detail', 'showAddToCart'));
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
