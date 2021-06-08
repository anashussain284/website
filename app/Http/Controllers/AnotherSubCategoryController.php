<?php

namespace App\Http\Controllers;

use App\AnotherSubCategory;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;

class AnotherSubCategoryController extends Controller
{
    # function to add another sub category - 07/06/2021
    public function anotherSubCategoryAdd()
    {
        $sub_categories = SubCategory::oldest('sub_category')->get();
        return view('another_sub_category.add', compact('sub_categories'));
    }

    # function to store another sub category - 07/06/2021
    public function anotherSubCategoryStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sub_category' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->with('error', $validator->errors());
        } else {
            $sub_category_id = $request->sub_category;
            $sub_category = SubCategory::findOrFail($sub_category_id);
            $sub_category_url = $sub_category->sub_category;
            $sub_category_array = explode("/", $sub_category_url);
            $category_id = $sub_category->category_id;
            $category_name = $sub_category_array[1];
            $sub_category_name = $sub_category_array[2];
            $another_sub_category_name = $request->name;
            $another_sub_category = new AnotherSubCategory;
            $another_sub_category->category_id = $category_id;
            $another_sub_category->sub_category_id = $sub_category_id;
            $another_sub_category->another_sub_category = "website.com/$category_name/$sub_category_name/$another_sub_category_name";
            $another_sub_category->save();
            return Redirect::route('another-sub-categories.index')->with('success', 'Another sub category added successfully');
        }
    }

    # function to list all another sub categories - 07/06/2021
    public function anotherSubCategoryIndex()
    {
        $another_sub_categories = AnotherSubCategory::latest('id')->paginate(15);
        return view('another_sub_category.index', compact('another_sub_categories'));
    }

    # function to delete another sub category - 07/06/2021
    public function anotherSubCategoryDelete($id)
    {
        $another_sub_category = AnotherSubCategory::findOrFail($id);
        if ($another_sub_category) {
            AnotherSubCategory::destroy($id);
            return Redirect::route('another-sub-categories.index')->with('success', 'Another Sub-Category deleted successfully');
        } else {
            return Redirect::route('another-sub-categories.index')->with('error', 'Invalid Request');
        }
    }

    # function to edit another sub category - 07/06/2021
    public function anotherSubCategoryEdit($id)
    {
        $sub_categories = SubCategory::oldest('sub_category')->get();
        $another_sub_category = AnotherSubCategory::findOrFail($id);
        if ($another_sub_category) {
            return view('another_sub_category.edit', compact('sub_categories', 'another_sub_category'));
        } else {
            return Redirect::back()->with('error', 'Invalid Request');
        }
    }

    # function to update another sub category - 07/06/2021
    public function sanotherSbCategoryUpdate(Request $request)
    {
        $id = $request->id;
        $another_sub_category = AnotherSubCategory::findOrFail($id);
        if ($another_sub_category) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'sub_category' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->with('error', $validator->errors());
            } else {
                $sub_category_id = $request->sub_category;
                $sub_category = SubCategory::findOrFail($sub_category_id);
                $sub_category_url = $sub_category->sub_category;
                $sub_category_array = explode("/", $sub_category_url);
                $category_id = $sub_category->category_id;
                $category_name = $sub_category_array[1];
                $sub_category_name = $sub_category_array[2];
                $another_sub_category_name = $request->name;
                AnotherSubCategory::where('id', $id)->update([
                    'category_id' => $category_id,
                    'sub_category_id' => $sub_category_id,
                    'another_sub_category' => "website.com/$category_name/$sub_category_name/$another_sub_category_name",
                ]);
                $products = Product::all();
                foreach ($products as $product) {
                    $url = $product->product;
                    $array = explode("/", $url);
                    $category_name = $array[1];
                    $sub_category_name = $array[2];
                    $product_name = $array[4];

                    Product::where('id', $product->id)
                        ->where('category_id', $product->category_id)
                        ->where('sub_category_id', $product->sub_category_id)
                        ->where('another_sub_category_id', $id)
                        ->update([
                            'product' => "website.com/$category_name/$sub_category_name/$another_sub_category_name/$product_name",
                        ]);

                }
                return Redirect::route('another-sub-categories.index')->with('success', 'Another Sub-Category updated successfully');
            }
        } else {
            return Redirect::back()->with('error', 'Invalid Request');
        }
    }
}
