<?php

namespace App\Http\Controllers\Site\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Repositories\Products\ProductsRepository;
use App\Repositories\Products\ProductCriteria;
use App\Repositories\Categories\CategoriesRepository;

class ProductController extends Controller
{
    protected $product;
    protected $category;
    public function __construct(ProductsRepository $product, CategoriesRepository $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function demo(Request $request)
    {
        $d = $this->product->scope($request)->get();
        dd($d)  ;
    }
    public function shop()
    {
        $data['products'] = $this->product->paginate(3);
        $data['categories'] = $this->category->get();
        return view('frontend/products/shop', $data);
    }
    public function detail($slug)
    {
        // $data['product'] = Product::where('slug',$slug)->first();
        $data['product'] = $this->product->findWhere(['slug' => $slug])->first();
        // $data['products']= Product::orderBy('id','desc')->limit(4)->get();
        $data['products'] = $this->product->orderBy('id', 'desc')->limit(4)->get();
        return view('frontend/products/detail', $data); 
    }
    public function filter(Request $request)
    {
        $data['categories'] = Category::all();
        $start = $request->start;
        $end = $request->end;
        // $data['products'] = Product::whereBetween('price', [$start, $end])->orderBy('id', "desc")->paginate(3);
        $data['products'] = $this->product->whereBetween('price', [$start, $end])->orderBy('id', "desc")->paginate(3);
        $data['products']->appends('start', $start);
        $data['products']->appends('end', $end);
        return view('frontend/products/shop', $data);
    }
}
