<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Slug;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(5);

        return view('/backend/products/listproduct', ['products' => $product]);
    }
    public function create()
    {
        $cat = Category::all();
        return view('/backend/products/addproduct', ['category' => $cat]);
    }
    public function store(Request $request)
    {
        $categories_id = $request->categories;
        $code = $request->code;
        $name = $request->name;
        $slug = Slug::getSlug($name);
        $price = $request->price;
        $featured = $request->featured;
        $state = $request->state;
        $info = $request->info;
        $describe = $request->describe;

        if ($request->hasFile('img')) {
            $file = $request->img;
            $file_name = $file->getClientOriginalName();
            $slug_name = Slug::getSlug($file_name);
            $file_extension = $file->getClientOriginalExtension();
            $image = $slug_name . '.' . $file_extension;
            $file->move('uploads', $image);
        }
        $product = new Product;
        $product->categories_id = $categories_id;
        $product->name = $name;
        $product->code = $code;
        $product->slug = $slug;
        $product->info = $info;
        $product->describer = $describe;
        $product->image = $image;
        $product->price = $price;
        $product->featured = $featured;
        $product->state = $state;
        $product->save();
        return redirect("/admin/productlist");
    }
    public function edit($id)
    {
        $cat = Category::all();
        $product = Product::find($id);
        return view('/backend/products/editproduct', ['products' => $product], ['category' => $cat]);
    }
    public function update(Request $request, $id)
    {
        $categories_id = $request->categories;
        $code = $request->code;
        $name = $request->name;
        $slug = Slug::getSlug($name);
        $price = $request->price;
        $featured = $request->featured;
        $state = $request->state;
        $info = $request->info;
        $describe = $request->describe;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $slug_name = Slug::getSlug($file_name);
            $file_extension = $file->getClientOriginalExtension();
            $image = $slug_name . '.' . $file_extension;
            $file->move('uploads', $image);
        } else {
            $image = Product::find($id)->image;
        }
        $product = Product::find($id);
        $product->categories_id = $categories_id;
        $product->name = $name;
        $product->code = $code;
        $product->slug = $slug;
        $product->info = $info;
        $product->describer = $describe;
        $product->image = $image;
        $product->price = $price;
        $product->featured = $featured;
        $product->state = $state;

        $product->save();
        return redirect("/admin/productlist");
    }
    public function delete($id)
    {
        Product::find($id)->delete($id);
        return redirect('/admin/productlist')->with('thongbao',"Đã xóa thành công");
    } 
}
