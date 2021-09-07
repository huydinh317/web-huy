<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class CategoryController extends Controller
{
    public function index()
    {
        $cat = Category::all();
        return view('/backend/categories/category',['category'=>$cat]);
    }
    public function create()
    {
        $cat = Category::all();
        return view('/backend/categories/addcategory',['category'=>$cat]);

    }
    public function store()
    {
        return view('/backend/categories/editcategory');

    }
    public function edit()
    {
        return view('/backend/categories/editcategory');
    }
    public function update()
    {
        return view('/backend/categories/editcategory');

    }
    public function delete()
    {
        return view('/backend/categories/editcategory');

    }
}
