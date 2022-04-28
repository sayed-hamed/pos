@extends('dashboard.empty')
@section('css')
    @toastr_css

@section('title')
    {{trans('main_trans.products')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('main_trans.products')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main_trans.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('main_trans.products')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @include('dashboard.errors')

    <form method="post" action="{{route('dashboard.products.update',$product->id)}}" enctype="multipart/form-data">
        {{@csrf_field()}}
        {{@method_field('PUT')}}

        <select name="cat" class="custom-select">
{{--            <option selected>{{trans('main_trans.All Categories')}}</option>--}}
            @foreach($cats as $cat)
                <option value="{{$cat->id}}" @if($product->cat_id == $cat->id) selected @else '' @endif>{{$cat->name}}</option>
            @endforeach
        </select>

        <div class="form-group bg-light">
            <label for="exampleInputEmail1">{{trans('main_trans.Name')}}</label>
            <input type="text" name="name" value="{{$product->name}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('main_trans.Name')}}">
        </div>



        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{trans('main_trans.description')}}</label>
            <textarea class="form-control ckeditor" value="{{$product->desc}}"  name="desc" id="exampleFormControlTextarea1" rows="3">{{$product->desc}}</textarea>
        </div>



        <div class="form-group">
            <label for="exampleInputEmail1">{{trans('main_trans.image')}}</label>
            <input type="file" name="img" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('main_trans.image')}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">{{trans('main_trans.image')}}</label>
            <img src="{{asset('uploads/products/'.$product->img)}}" style="width: 100px" class="img-thumbnail">
        </div>

        <div class="form-group bg-light">
            <label for="exampleInputEmail1">{{trans('main_trans.stock')}}</label>
            <input type="number" value="{{$product->stock}}"  name="stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('main_trans.Name')}}">
        </div>

        <div class="form-group bg-light">
            <label for="exampleInputEmail1">{{trans('main_trans.per_price')}}</label>
            <input type="number" name="per_price" value="{{$product->per_price}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('main_trans.Name')}}">
        </div>

        <div class="form-group bg-light">
            <label for="exampleInputEmail1">{{trans('main_trans.sale_price')}}</label>
            <input type="number" name="sale_price" value="{{$product->sale_price}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('main_trans.Name')}}">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
