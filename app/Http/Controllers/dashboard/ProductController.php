<?php

namespace App\Http\Controllers\dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products=Product::when($request->search,function ($q) use ($request){

            return $q->where('name','like','%'.$request->search.'%');

        })->latest()->paginate(5);
        return view('dashboard.products.index',compact('products'));
    }


    public function create()
    {
        $cats=Category::all();
        return view('dashboard.products.create',compact('cats'));
    }


    public function store(Request $request)
    {
        $request->validate([
           'cat'=>'required',
           'name'=>'required',
           'desc'=>'required',
           'desc_ar'=>'required',
           'img'=>'required|image',
           'per_price'=>'required',
           'stock'=>'required',
           'sale_price'=>'required',
        ]);

        if ($request->hasFile('img')){
            Image::make($request->img)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/products/'.$request->img->hashName()));
        }

        Product::create([
            'cat_id'=>$request->cat,
            'name'=>['en'=>$request->name,'ar'=>$request->name_ar],
            'desc'=>['en'=>$request->desc,'ar'=>$request->desc_ar],
            'img'=>$request->img->hashName(),
            'per_price'=>$request->per_price,
            'sale_price'=>$request->sale_price,
            'stock'=>$request->stock,
        ]);
        toastr()->success('Added Successfully');
        return redirect()->route('dashboard.products.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $product=Product::findOrFail($id);
        $cats=Category::all();

        return view('dashboard.products.edit',compact('cats','product'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([

            'cat'=>'nullable',
            'name'=>'nullable',
            'desc'=>'nullable',
            'desc_ar'=>'nullable',
            'img'=>'nullable',
            'per_price'=>'required',
            'stock'=>'required',
            'sale_price'=>'required',

        ]);

        $product=Product::findOrFail($id);




        if ($request->hasFile('img')){
            Image::make($request->img)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/products/'.$request->img->hashName()));
        }

        $product->update([
            'cat_id'=>$request->cat,
            'name'=>['en'=>$request->name,'ar'=>$request->name_ar],
            'desc'=>['en'=>$request->desc,'ar'=>$request->desc_ar],
            'img'=>$request->img->hashName(),
            'per_price'=>$request->per_price,
            'sale_price'=>$request->sale_price,
            'stock'=>$request->stock,
        ]);

        toastr()->info('Updated Successfully');
        return redirect()->route('dashboard.products.index');

    }


    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        if ($product->img){
            Storage::disk('public_uploads')->delete('/products/'.$product->img);
        }

        $product->delete();

        toastr()->error('Deleted Successfully');
        return redirect()->route('dashboard.products.index');

    }
}
