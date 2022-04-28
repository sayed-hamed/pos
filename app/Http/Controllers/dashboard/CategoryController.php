<?php

namespace App\Http\Controllers\dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $cats=Category::when($request->search,function ($q) use ($request){

            return $q->where('name','like','%'.$request->search.'%');

        })->latest()->paginate(20);
        return view('dashboard.categories.index',compact('cats'));
    }


    public function create()
    {
        return view('dashboard.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'name_ar'=>'required'
        ]);

        Category::create([
            'name'=>['en'=>$request->name,'ar'=>$request->name_ar]
        ]);

        toastr()->success('Added Successfully');
        return view('dashboard.categories.index');

    }

    public function show($id){
        $products=Product::where('cat_id',$id)->get();
        return view('dashboard.categories.products',compact('products'));
    }


    public function edit($id)
    {
        $cats=Category::findOrFail($id);
        return view('dashboard.categories.edit',compact('cats'));
    }


    public function update(Request $request, $id)
    {
        $cat=Category::findOrFail($id);

        $request->validate([
            'name'=>'required',
        ]);

        $cat->update([
            'name'=>['en'=>$request->name,'ar'=>$request->name_ar]
        ]);

        toastr()->info('Updated Successfully');
        return redirect()->route('dashboard.categories.index');

    }




    public function destroy($id)
    {
        $cat=Category::findOrFail($id);
        $cat->delete();

        toastr()->error('Deleted Successfully');
        return redirect()->route('dashboard.categories.index');

    }
}
