<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function getBrands()
    {
        $brands = Brand::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.brands.brands', ['brands' => $brands]);
    }

    public function postBrands(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_description' => 'nullable|string',
            'burl' => 'nullable|url',
            'status' => 'required|in:Active,Inactive',
        ], [
            'brand_name.required' => 'The brand name is required.',
            'brand_name.max' => 'The brand name cannot exceed 255 characters.',
            'burl.url' => 'The brand URL must be a valid URL.',
            'status.required' => 'Please select a status.',
            'status.in' => 'The status must be either Active or Inactive.',
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->burl = $request->burl;
        $brand->status = $request->status === 'Active' ? 1 : 0;

        if ($request->brand_logo != '') {
            $getImage = $request->brand_logo;
            $getImageExtension = $getImage->getClientOriginalExtension();
            $setImageName = time() . '.' . $getImageExtension;
            $getImage->move(public_path("Images/brand_img"), $setImageName);
            $brand->brand_logo = $setImageName;
        }
        $brand->save();
        return redirect()->route('getBrands')->with('success', 'Brand added successfully!');
    }

    public function getBrandsEdit($id)
    {
        $brands = Brand::findOrFail($id);
        return view('admin.brands.editBrands', compact('brands'));
    }

    public function postUpdateBrands(Request $request, $id)
    {
        $b = Brand::findOrFail($id);
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_description' => 'required|string',
            'burl' => 'nullable|url',
            'status' => 'required|in:Active,Inactive',
        ], [
            'brand_name.required' => 'The category name is required.',
            'brand_name.max' => 'The category name must not exceed 255 characters.',
            'brand_description.required' => 'Please provide a description for the category.',
            'burl.url' => 'Enter correct url.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status must be either Active or Inactive.'
        ]);

        $b->brand_name = $request->brand_name;
        $b->brand_description = $request->brand_description;
        $b->burl = $request->burl;
        $b->status = $request->status === 'Active' ? 1 : 0;

        if ($request->hasFile('brand_logo')) {
            if ($b->brand_logo) {
                File::delete(public_path('Images/brand_img' . $b->brand_logo));
            }

            $image = $request->file('brand_logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("Images/brand_img"), $imageName);
            $b->brand_logo = $imageName;
        }

        $b->save();

        return redirect()->route('getBrands')->with('success', 'Brand Updated successfully!');

    }

    public function deleteBrandId($id)
    {
        $deleteBrandById = Brand::findOrFail($id);
        File::delete(public_path('Images/brand_img/' . $deleteBrandById->brand_logo));
        $deleteBrandById->delete();
        return redirect()->route('getBrands')->with('success', 'Brand deleted successfully!');
    }
}