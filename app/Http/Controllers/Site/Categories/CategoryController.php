<?php

namespace App\Http\Controllers\Site\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function cat($slug){
        $slug_id = Category::where('slug',$slug)->get('id');
        $data['categories'] = Category::all();
        $data['products'] = Product::with('categories')->where('categories_id','=',$slug_id[0]->id)->paginate(3);
        return view('/frontend/products/shop',$data);
    }

}
