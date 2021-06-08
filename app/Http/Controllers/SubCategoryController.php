<?php

namespace App\Http\Controllers;

use App\AnotherSubCategory;
use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;

class SubCategoryController extends Controller
{
    # function to list all sub categories - 07/06/2021
    public function subCategoryIndex()
    {
        $sub_categories = SubCategory::latest('id')->paginate(15);
        return view('sub_category.index', compact('sub_categories'));
    }

    # function to add sub category - 07/06/2021
    public function subCategoryAdd()
    {
        $categories = Category::oldest('category')->get();
        return view('sub_category.add', compact('categories'));
    }

    # function to store sub category - 07/06/2021
    public function subCategoryStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->with('error', $validator->errors());
        } else {
            $category_id = $request->category_id;
            $category = Category::findOrFail($category_id);
            $category_url = $category->category;
            $array = explode("/", $category_url);
            $sub_category_name = $request->name;
            $sub_category = new SubCategory;
            $sub_category->category_id = $category_id;
            $sub_category->sub_category = "website.com/$array[1]/$sub_category_name";
            $sub_category->save();
            return Redirect::route('sub-categories.index')->with('success', 'Sub category added successfully');
        }
    }

    # function to edit sub category - 07/06/2021
    public function subCategoryEdit($id)
    {
        $categories = Category::oldest('category')->get();
        $sub_category = SubCategory::findOrFail($id);
        if ($sub_category) {
            return view('sub_category.edit', compact('categories', 'sub_category'));
        } else {
            return Redirect::back()->with('error', 'Invalid Request');
        }
    }

    # function to update sub category - 07/06/2021
    public function subCategoryUpdate(Request $request)
    {
        $id = $request->id;
        $sub_category = SubCategory::findOrFail($id);
        if ($sub_category) {
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->with('error', $validator->errors());
            } else {
                $category_id = $request->category_id;
                $category = Category::findOrFail($category_id);
                $category_url = $category->category;
                $category_array = explode("/", $category_url);
                $category_name = $category_array[1];
                $sub_category_name = $request->name;
                SubCategory::where('id', $id)->update([
                    'category_id' => $request->category_id,
                    'sub_category' => "website.com/$category_name/$sub_category_name",
                ]);
                $another_sub_category = AnotherSubCategory::all();
                foreach ($another_sub_category as $ano_sub) {
                    $url = $ano_sub->another_sub_category;
                    $array = explode("/", $url);
                    $category_name = $array[1];
                    $another_sub_category_name = $array[3];

                    AnotherSubCategory::where('id', $ano_sub->id)
                        ->where('category_id', $ano_sub->category_id)
                        ->where('sub_category_id', $id)
                        ->update([
                            'another_sub_category' => "website.com/$category_name/$sub_category_name/$another_sub_category_name",
                        ]);
                    $products = Product::all();
                    foreach ($products as $product) {
                        $url = $product->product;
                        $array = explode("/", $url);
                        $category_name = $array[1];
                        $another_sub_category_name = $array[3];
                        $product_name = $array[4];

                        Product::where('id', $product->id)
                            ->where('category_id', $product->category_id)
                            ->where('another_sub_category_id', $product->another_sub_category_id)
                            ->where('sub_category_id', $id)
                            ->update([
                                'product' => "website.com/$category_name/$sub_category_name/$another_sub_category_name/$product_name",
                            ]);
                    }
                }
                return Redirect::route('sub-categories.index')->with('success', 'Sub-Category updated successfully');
            }
        } else {
            return Redirect::back()->with('error', 'Invalid Request');
        }
    }

    # function to delete sub category - 07/06/2021
    public function subCategoryDelete($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        if ($sub_category) {
            SubCategory::destroy($id);
            return Redirect::route('sub-categories.index')->with('success', 'Sub-Category deleted successfully');
        } else {
            return Redirect::route('sub-categories.index')->with('error', 'Invalid Request');
        }
    }

}
