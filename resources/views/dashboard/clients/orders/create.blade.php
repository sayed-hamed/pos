@extends('dashboard.empty')
@section('css')
    @toastr_css

@section('title')
    {{trans('main_trans.orders')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('main_trans.orders')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('main_trans.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('main_trans.orders')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="row d-flex justify-content-md-around">

        <div class="col-md-5" style="background-color:#fff;">

            <div class="box box-primary">

                <div class="box-header">

                    <h3 class="box-title" style="margin-bottom: 10px">@lang('main_trans.Categories')</h3>

                </div><!-- end of box header -->

                <div class="box-body">

                    @foreach ($categories as $category)

                        <div class="panel-group">

                            <div class="panel panel-default" style="background-color:#fff8f8;">

                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse"  href="#{{ str_replace(' ', '-', $category->name) }}">{{ $category->name }}</a>
                                    </h4>
                                </div>

                                <div id="{{ str_replace(' ', '-', $category->name) }}" class="panel-collapse collapse ">

                                    <div class="panel-body">

                                        @if ($category->products->count() > 0)

                                            <table class="table table-hover">
                                                <tr>
                                                    <th>@lang('main_trans.Name')</th>
                                                    <th>@lang('main_trans.stock')</th>
                                                    <th>@lang('main_trans.price')</th>
                                                    <th>@lang('main_trans.add')</th>
                                                </tr>

                                                @foreach ($category->products as $product)
                                                    <tr>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->stock }}</td>
                                                        <td>{{ number_format($product->sale_price, 2) }}</td>
                                                        <td>
                                                            <a href=""
                                                               id="product-{{ $product->id }}"
                                                               data-name="{{ $product->name }}"
                                                               data-id="{{ $product->id }}"
                                                               data-price="{{ $product->sale_price }}"
                                                               class="btn btn-success btn-sm add-product-btn">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </table><!-- end of table -->

                                        @else
                                            <h5>@lang('main_trans.no_records')</h5>
                                        @endif

                                    </div><!-- end of panel body -->

                                </div><!-- end of panel collapse -->

                            </div><!-- end of panel primary -->

                        </div><!-- end of panel group -->

                    @endforeach

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </div><!-- end of col -->

        <div class="col-md-6 d " style="background-color:#fff;">

            <div class="box box-primary">

                <div class="box-header">

                    <h3 class="box-title">@lang('main_trans.orders')</h3>

                </div><!-- end of box header -->

                <div class="box-body">

                    <form action="{{ route('dashboard.clients.orders.store', $client->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        @include('dashboard.errors')

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>@lang('main_trans.products')</th>
                                <th>@lang('main_trans.quantity')</th>
                                <th>@lang('main_trans.price')</th>
                            </tr>
                            </thead>

                            <tbody class="order-list">


                            </tbody>

                        </table><!-- end of table -->

                        <h4>@lang('main_trans.total') : <span class="total-price">0</span></h4>

                        <button class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i class="fa fa-plus"></i> @lang('main_trans.add_order')</button>

                    </form>

                </div><!-- end of box body -->

            </div><!-- end of box -->

{{--            @if ($client->orders->count() > 0)--}}

                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title" style="margin-bottom: 10px">@lang('main_trans.previous_orders')
{{--                            <small>{{ $orders->total() }}</small>--}}
                        </h3>

                    </div><!-- end of box header -->

                    <div class="box-body">

{{--                        @foreach ($orders as $order)--}}

{{--                            <div class="panel-group">--}}

{{--                                <div class="panel panel-success">--}}

{{--                                    <div class="panel-heading">--}}
{{--                                        <h4 class="panel-title">--}}
{{--                                            <a data-toggle="collapse" href="#{{ $order->created_at->format('d-m-Y-s') }}">{{ $order->created_at->toFormattedDateString() }}</a>--}}
{{--                                        </h4>--}}
{{--                                    </div>--}}

{{--                                    <div id="{{ $order->created_at->format('d-m-Y-s') }}" class="panel-collapse collapse">--}}

{{--                                        <div class="panel-body">--}}

{{--                                            <ul class="list-group">--}}
{{--                                                @foreach ($order->products as $product)--}}
{{--                                                    <li class="list-group-item">{{ $product->name }}</li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}

{{--                                        </div><!-- end of panel body -->--}}

{{--                                    </div><!-- end of panel collapse -->--}}

{{--                                </div><!-- end of panel primary -->--}}

{{--                            </div><!-- end of panel group -->--}}

{{--                        @endforeach--}}

{{--                        {{ $orders->links() }}--}}

                    </div><!-- end of box body -->

                </div><!-- end of box -->

{{--            @endif--}}

        </div><!-- end of col -->

    </div><!-- end of row -->

    </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
