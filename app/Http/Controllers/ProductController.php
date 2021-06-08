<?php

namespace App\Http\Controllers;

use App\AnotherSubCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;

class ProductController extends Controller
{
    # fuction to add product - 07/06/2021
    public function productAdd()
    {
        $another_sub_category = AnotherSubCategory::oldest('another_sub_category')->get();
        return view('product.add', compact('another_sub_category'));
    }

    # function to store product - 07/06/2021
    public function productStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'another_sub_category' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->with('error', $validator->errors());
        } else {
            $another_sub_category_id = $request->another_sub_category;
            $another_sub_category = AnotherSubCategory::findOrFail($another_sub_category_id);
            $another_sub_category_url = $another_sub_category->another_sub_category;
            $another_sub_category_array = explode("/", $another_sub_category_url);
            $category_id = $another_sub_category->category_id;
            $sub_category_id = $another_sub_category->sub_category_id;
            $another_sub_category_id = $request->another_sub_category;
            $category_name = $another_sub_category_array[1];
            $sub_category_name = $another_sub_category_array[2];
            $another_sub_category_name = $another_sub_category_array[3];
            $product_name = $request->name;
            $product = new Product;
            $product->category_id = $category_id;
            $product->sub_category_id = $sub_category_id;
            $product->another_sub_category_id = $another_sub_category_id;
            $product->product = "website.com/$category_name/$sub_category_name/$another_sub_category_name/$product_name";
            $product->save();
            return Redirect::route('products.index')->with('success', 'Product added successfully');
        }
    }

    # function for list all products - 07/06/2021
    public function productIndex()
    {
        $products = Product::latest('id')->paginate(15);
        return view('product.index', compact('products'));
    }

    # function to delete product - 07/06/2021
    public function productDelete($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            Product::destroy($id);
            return Redirect::route('products.index')->with('success', 'Product deleted successfully');
        } else {
            return Redirect::route('products.index')->with('error', 'Invalid Request');
        }
    }

    # function to edit product - 07/06/2021
    public function productEdit($id)
    {
        $another_sub_category = AnotherSubCategory::oldest('another_sub_category')->get();
        $product = Product::findOrFail($id);
        return view('product.edit', compact('another_sub_category', 'product'));
    }

    # function to update product - 07/06/2021
    public function productUpdate(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);
        if ($product) {
            $validator = Validator::make($request->all(), [
                'another_sub_category' => 'required',
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->with('error', $validator->errors());
            } else {
                $another_sub_category_id = $request->another_sub_category;
                $another_sub_category = AnotherSubCategory::findOrFail($another_sub_category_id);
                $another_sub_category_url = $another_sub_category->another_sub_category;
                $another_sub_category_array = explode("/", $another_sub_category_url);
                $category_id = $another_sub_category->category_id;
                $sub_category_id = $another_sub_category->sub_category_id;
                $another_sub_category_id = $request->another_sub_category;
                $category_name = $another_sub_category_array[1];
                $sub_category_name = $another_sub_category_array[2];
                $another_sub_category_name = $another_sub_category_array[3];
                $product_name = $request->name;
                Product::where('id', $id)->update([
                    'category_id' => $category_id,
                    'sub_category_id' => $sub_category_id,
                    'another_sub_category_id' => $another_sub_category_id,
                    'product' => "website.com/$category_name/$sub_category_name/$another_sub_category_name/$product_name",
                ]);
                return Redirect::route('products.index')->with('success', 'Product updated successfully');
            }
        } else {
            return Redirect::back()->with('error', 'Invalid Request');
        }
    }
}
