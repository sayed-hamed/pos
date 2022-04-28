<?php

namespace App\Http\Controllers\dashboard\client;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Client $client)
    {
        $categories=Category::with('products')->get();
        return view('dashboard.clients.orders.create',compact('client','categories'));
    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
