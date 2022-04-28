<?php

namespace App\Http\Controllers\dashboard;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        $clients=Client::when($request->search,function ($q) use ($request){
            return $q->where('name','like','%'.$request->search.'%')
                ->orwhere('phone','like','%'.$request->search.'%')
                ->orwhere('address','like','%'.$request->search.'%');
        })->latest()->paginate(5);
        return view('dashboard.clients.index',compact('clients'));
    }


    public function create()
    {
        return view('dashboard.clients.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'name_ar'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'address_ar'=>'required',
        ]);

        Client::create([
            'name'=>['en'=>$request->name,'ar'=>$request->name_ar],
            'address'=>['en'=>$request->address,'ar'=>$request->address_ar],
            'phone'=>$request->phone,
        ]);

        toastr()->success('Add Successfully');
        return redirect()->route('dashboard.clients.index');


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $client=Client::findOrFail($id);
        return view('dashboard.clients.edit',compact('client'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $client=Client::findOrFail($id);

        $client->update([
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
        ]);

            toastr()->info('Updated Successfully');
        return redirect()->route('dashboard.clients.index');
    }


    public function destroy($id)
    {
        $client=Client::findOrFail($id);
        $client->delete();

        toastr()->error('Deleted Successfully');
        return redirect()->route('dashboard.clients.index');

    }
}
