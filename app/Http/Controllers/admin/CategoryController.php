<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class CategoryController extends Controller
{
    use WithPagination;

    public function getCategory()
    {
        return view('admin.category.category');
    }

    public function postCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|unique:categories,slug|max:255',
            'status' => 'required|in:Active,Inactive',
            'image' => 'required',
        ], [
            'name.required' => 'The category name is required.',
            'name.max' => 'The category name must not exceed 255 characters.',
            'description.required' => 'Please provide a description for the category.',
            'slug.required' => 'The slug field is mandatory.',
            'slug.unique' => 'This slug is already in use, please choose another one.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status must be either Active or Inactive.',
            'image.required' => 'An image is required for the category.',
        ]);

        $c = new Category();
        $c->name = $request->name;
        $c->description = $request->description;
        $c->slug = $request->slug;
        $c->status = $request->status === 'Active' ? 1 : 0;

        if ($request->image != '') {
            $image = $request->image;
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = time() . "." . $imageExtension;
            $image->move(public_path("Images/category_img"), $imageName);
            $c->image = $imageName;
        }

        $c->save();

        return redirect()->route('categoryList')->with('success', 'Category added Successfully');

    }

    public function categoryList()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.category.categoryList', ['category' => $categories]);
    }

    public function getEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.editCategory', ['category' => $category]);
    }

    public function postEditCategory($id, Request $request)
    {
        $c = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|unique:categories,slug|max:255',
            'status' => 'required|in:Active,Inactive',
        ], [
            'name.required' => 'The category name is required.',
            'name.max' => 'The category name must not exceed 255 characters.',
            'description.required' => 'Please provide a description for the category.',
            'slug.required' => 'The slug field is mandatory.',
            'slug.unique' => 'This slug is already in use, please choose another one.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status must be either Active or Inactive.'
        ]);

        $c->name = $request->name;
        $c->description = $request->description;
        $c->slug = $request->slug;
        $c->status = $request->status === 'Active' ? 1 : 0;

        if ($request->hasFile('image')) {
            if ($c->image) {
                File::delete(public_path('Images/category_img' . $c->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("Images/category_img"), $imageName);
            $c->image = $imageName;
        }

        $c->save();

        return redirect()->route('categoryList')->with('success', 'Category Edited Successfully');

    }

    public function deleteCategory($id)
    {
        $deleteCategoryMessage = "Category deleted successufully";
        $deleteCategory = Category::findOrFail($id);
        File::delete(public_path('Images/category_img/' . $deleteCategory->image));
        $deleteCategory->delete();
        return redirect()->route('categoryList')->with('success', $deleteCategoryMessage);
    }

}