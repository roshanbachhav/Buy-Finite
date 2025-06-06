<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function getProduct()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.product', compact('categories', 'brands'));
    }

    public function postProduct(Request $request)
    {
        $request->validate(
            [
                'productName' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'listPrice' => 'required|numeric|min:0',
                'ourPrice' => 'required|numeric|min:0|lt:listPrice',
                'category_id' => 'required|exists:categories,id',
                'starRating' => 'required|integer|min:1|max:5',
                'featured' => 'required|boolean',
            ],
            [
                'productName.required' => 'The Product Name is mandatory. Please enter a valid name.',
                'description.required' => 'The Product Description cannot be empty. Provide some details about the product.',
                'listPrice.required' => 'The List Price is mandatory. Enter a valid price amount.',
                'ourPrice.required' => 'The Our Price field cannot be empty. Ensure it is lower than List Price.',
                'ourPrice.lt' => 'Our Price must be less than the List Price.',
                'category_id.required' => 'Please select a valid category from the list.',
                'category_id.exists' => 'The selected category does not exist in the database.',
                'starRating.required' => 'Please select a star rating between 1 to 5.',
                'featured.required' => 'Please choose whether the product is featured or not.',
                'featured.boolean' => 'The featured field must be Yes or No only.'
            ]
        );

        $listPrices = $request->input('listPrice');
        $ourPrices = $request->input('ourPrice');
        $off = (($listPrices - $ourPrices) / $listPrices) * 100;

        $product = new Product();
        $product->productName = $request->input('productName');
        $product->description = $request->input('description');
        $product->listPrice = $listPrices;
        $product->ourPrice = $ourPrices;
        $product->off = round($off, 2);
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->starRating = $request->input('starRating');
        $product->featured = $request->input('featured');

        if ($request->productImage != '') {
            $getImage = $request->productImage;
            $getImageExtension = $getImage->getClientOriginalExtension();
            $setImageName = time() . '.' . $getImageExtension;
            $getImage->move(public_path("Images/product_img"), $setImageName);
            $product->productImage = $setImageName;
        }
        $product->save();

        return redirect()->route('productList')->with('success', 'Product added Successfully');
    }

    public function showProductList()
    {

        $products = Product::with('category')->with('brand')->orderBy('created_at', 'desc')->paginate(5);
        $totalProducts = Product::count('id');
        return view('admin.product.productList', ['products' => $products, 'tp' => $totalProducts]);
    }

    public function getProductEdit($id)
    {
        $getProductById = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.editProduct', ['p' => $getProductById], ['categories' => $categories, 'brands' => $brands]);
    }

    public function postUpdateProduct($id, Request $request)
    {
        $p = Product::findOrFail($id);

        $request->validate(
            [
                'productName' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'listPrice' => 'required|numeric|min:0',
                'ourPrice' => 'required|numeric|min:0|lt:listPrice',
                'category_id' => 'required|exists:categories,id',
                'starRating' => 'required|integer|min:1|max:5',
                'featured' => 'required|boolean',
            ]
        );

        $listPrices = $request->input('listPrice');
        $ourPrices = $request->input('ourPrice');
        $off = (($listPrices - $ourPrices) / $listPrices) * 100;

        $p->productName = $request->input('productName');
        $p->description = $request->input('description');
        $p->listPrice = $listPrices;
        $p->ourPrice = $ourPrices;
        $p->off = round($off, 2);
        $p->category_id = $request->input('category_id');
        $p->brand_id = $request->input('brand_id');
        $p->starRating = $request->input('starRating');
        $p->featured = $request->input('featured');

        if ($request->hasFile('productImage')) {
            if ($p->productImage) {
                File::delete(public_path('Images/product_img/' . $p->productImage));
            }
            $getImage = $request->productImage;
            $getImageExtension = $getImage->getClientOriginalExtension();
            $setImageName = time() . '.' . $getImageExtension;
            $getImage->move(public_path("Images/product_img"), $setImageName);
            $p->productImage = $setImageName;
        }

        $p->save();


        return redirect()->route('productList')->with('success', 'Product Edited Successfully');
    }

    public function deleteProductById($id)
    {
        $deleteProduct = Product::findOrFail($id);
        File::delete(public_path("Images/product_img/" . $deleteProduct->productImage));
        $deleteProduct->delete();
        return redirect()->route('productList')->with('success', 'Product Deleted Successfully');
    }

}