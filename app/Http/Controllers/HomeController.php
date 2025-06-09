<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;
use Mail;
use Validator;

class HomeController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::where('featured', 1)->orderBy('created_at', 'desc')->paginate(8);
        return view('home', compact('featuredProducts'));
    }

    public function productsPageView(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $sort = $request->get('sort', 'created_at,desc');
        [$column, $direction] = explode(',', $sort);

        $query = Product::query();

        if ($request->has('searchInput') && $request->get('searchInput') != '') {
            $searchTerm = $request->get('searchInput');
            $query->where('productName', 'like', "%{$searchTerm}%");
        }

        if ($request->has('category_id')) {
            $query->whereIn('category_id', $request->get('category_id'));
        }

        if ($request->has('brand_id')) {
            $query->whereIn('brand_id', $request->get('brand_id'));
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('ourPrice', [
                $request->get('min_price'),
                $request->get('max_price')
            ]);
        }

        $products = $query->orderBy($column, $direction)->paginate(9);
        $maxPrice = Product::max('ourPrice');
        return view('productsView', compact('products', 'maxPrice', 'categories', 'brands'));
    }

    public function productOverview($id)
    {
        $p = Product::with('category')->with('brand')->findOrFail($id);
        return view('productOverview', compact('p'));
    }

    public function contactUsView()
    {
        return view('contactUs');
    }

    public function submitContactUsForm(Request $request)
    {
        $user = Auth::user();


        $v = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'phoneNo' => 'required|digits:10|regex:/^[0-9]{10}$/',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if ($v->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $v->errors()
            ], 422);
        }

        $contactMailData = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phoneNo' => $request->phoneNo,
            'subject' => $request->subject,
            'message' => $request->message,
            'main_subject' => "You Have a New Inquiry from Your Website"
        ];

        $c = new ContactUs();
        $c->first_name = $request->firstName;
        $c->last_name = $request->lastName;
        $c->email = $request->email;
        $c->phone_no = $request->phoneNo;
        $c->subject = $request->subject;
        $c->message = $request->message;
        $c->is_resolved = false;
        $c->ip_address = $request->ip();
        $c->user_id = $user->id;
        Mail::to('bachhavroshan600@gmail.com')->send(new ContactUsMail($contactMailData));
        $c->save();

        return response()->json([
            'status' => true,
            'message' => "Mail Send Successful",
        ], 200);
    }


}