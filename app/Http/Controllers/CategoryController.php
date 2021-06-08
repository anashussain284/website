<?php

namespace App\Http\Controllers;

use App\AnotherSubCategory;
use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;

class CategoryController extends Controller
{
    # function to return add page - 07/06/2021
    public function categoryAdd()
    {
        return view('category.add');
    }

    # function to store category - 07/06/2021
    public function categoryStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->with('error', $validator->$errors());
        } else {
            $category_name = $request->name;
            $category = new Category;
            $category->category = "website.com/$category_name";
            $category->save();
            return Redirect::route('categories.index')->with('success', 'Category added successfully');
        }
    }

    # function to list all categories - 07/06/2021
    public function categoryIndex()
    {
        $categories = Category::latest('id')->paginate('15');
        return view('category.index', compact('categories'));
    }

    # function to edit Category - 07/06/2021
    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            return view('category.edit', compact('category'));
        } else {
            return Redirect::route('category.index')->with('error', 'Invalid Request');
        }
    }

    # function to update category - 07/06/2021
    public function categoryUpdate(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        if ($category) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->with('error', $validator->errors());
            } else {
                $category_name = $request->name;
                Category::where('id', $id)->update([
                    'category' => "website.com/$category_name",
                ]);

                $sub_category = SubCategory::all();
                foreach ($sub_category as $sub_cat) {
                    $url = $sub_cat->sub_category;
                    $array = explode("/", $url);
                    $sub_category_name = $array[2];

                    SubCategory::where('id', $sub_cat->id)
                        ->where('category_id', $id)
                        ->update([
                            'sub_category' => "website.com/$category_name/$sub_category_name",
                        ]);
                    $another_sub_category = AnotherSubCategory::all();
                    foreach ($another_sub_category as $ano_sub) {
                        $url = $ano_sub->another_sub_category;
                        $array = explode("/", $url);
                        $sub_category_name = $array[2];
                        $another_sub_category_name = $array[3];

                        AnotherSubCategory::where('id', $ano_sub->id)
                            ->where('sub_category_id', $ano_sub->sub_category_id)
                            ->where('category_id', $id)
                            ->update([
                                'another_sub_category' => "website.com/$category_name/$sub_category_name/$another_sub_category_name",
                            ]);
                        $products = Product::all();
                        foreach ($products as $product) {
                            $url = $product->product;
                            $array = explode("/", $url);
                            $sub_category_name = $array[2];
                            $another_sub_category_name = $array[3];
                            $product_name = $array[4];

                            Product::where('id', $product->id)
                                ->where('sub_category_id', $product->sub_category_id)
                                ->where('another_sub_category_id', $product->another_sub_category_id)
                                ->where('category_id', $id)
                                ->update([
                                    'product' => "website.com/$category_name/$sub_category_name/$another_sub_category_name/$product_name",
                                ]);
                        }
                    }

                }
                return Redirect::route('categories.index')->with('success', 'Category updated successfully');
            }
        } else {
            return Redirect::back()->with('error', 'Invalid Request');
        }
    }

    # function to delete category - 07/06/2021
    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            Category::destroy($id);
            return Redirect::route('categories.index')->with('success', 'Category deleted Successfully');
        } else {
            return Redirect::route('categories.index')->with('error', 'Invalid Request');
        }
    }
}
