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
                    <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}" class="default-color">{{trans('main_trans.Home')}}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.products.index')}}">{{trans('main_trans.products')}}</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')




    <div class="row">
        <div class="col-xl-12 mb-30">
            <form method="" action="">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="search" placeholder="{{trans('main_trans.search')}}" style="background-color:#fff;">
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-lg btn-primary "> <i class="fa fa-search"></i> {{trans('main_trans.search')}}</button>
                        <a href="{{route('dashboard.products.create')}}" class="btn btn-lg btn-success "> <i class="fa fa-plus"></i> {{trans('main_trans.Add')}}</a>
                    </div>
                </div>
            </form>
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(\App\Category::count()>0)
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('main_trans.image')}}</th>
                                <th>{{trans('main_trans.Name')}}</th>
                                <th>{{trans('main_trans.description')}}</th>
                                <th>{{trans('main_trans.stock')}}</th>
                                <th>{{trans('main_trans.Category')}}</th>
                                <th>{{trans('main_trans.per_price')}}</th>
                                <th>{{trans('main_trans.sale_price')}}</th>
                                <th>{{trans('main_trans.profit')}}</th>
                                <th>{{trans('main_trans.Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                                $i=0
                            ?>

                            @foreach($products as $product)
                            <tr>
                                <td>{{++$i}}</td>
                                <td><img src="{{asset('uploads/products/'.$product->img)}}" style="width: 100px" alt="" class="img-thumbnail"></td>
                                <td>{{$product->name}}</td>
                                <td>{!! $product->desc !!}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->cat->name}}</td>
                                <td>{{$product->per_price}}</td>
                                <td>{{$product->sale_price}}</td>
                                <td>{{$product->profit_percentage}} %</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('dashboard.products.edit',$product->id)}}" style="display: inline-block">{{trans('main_trans.edit')}}</a>
                                    <form method="post" action="{{route('dashboard.products.destroy',$product->id)}}" style="display: inline-block">
                                        {{@csrf_field()}}
                                        {{@method_field('delete')}}
                                        <button type="submit" class="btn btn-danger ">{{trans('main_trans.delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                         @else
                            {{trans('main_trans.sorry there is no any data')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
