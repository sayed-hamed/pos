@extends('dashboard.empty')
@section('css')
    @toastr_css

@section('title')
    {{trans('main_trans.clients')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('main_trans.clients')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main_trans.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('main_trans.clients')}}</li>
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

    <form method="post" action="{{route('dashboard.clients.store')}}" enctype="multipart/form-data">
        {{@csrf_field()}}
        {{@method_field('post')}}

        <div class="form-group bg-light">
            <label for="exampleInputEmail1">{{trans('main_trans.Name')}}</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('main_trans.Name')}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">{{trans('main_trans.Name IN Arabic')}}</label>
            <input type="text" name="name_ar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('main_trans.Name IN Arabic')}}">
        </div>



        <div class="form-group">
            <label for="exampleInputEmail1">{{trans('main_trans.phone')}}</label>
            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{trans('main_trans.phone')}}">
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{trans('main_trans.address')}}</label>
            <textarea class="form-control ckeditor" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{trans('main_trans.address in arabic')}}</label>
            <textarea class="form-control ckeditor" name="address_ar" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
