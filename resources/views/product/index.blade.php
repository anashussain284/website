@extends('layout.default')
@section('title', 'Product Index')
@section('content')

    <div class="main-content">
        <div class="main-content-inner">
            <!-- #section:basics/content.breadcrumbs -->
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try {
                        ace.settings.check('breadcrumbs', 'fixed')
                    } catch (e) {
                    }
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="{{route('dashboard')}} ">Home</a>
                    </li>

                    <li class="active">Product</li>
                </ul><!-- /.breadcrumb -->

                <!-- /section:basics/content.searchbox -->
            </div>

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">


                <!-- /section:settings.box -->
                <div class="page-header">
                    <h1>
                        Product
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            All Products
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                @include('partials.notifications')
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="pull-right">
                                    <a href="{{route('products.add')}} " class="btn btn-info btn-sm">Add New
                                        Product</a>
                                </div>
                                <div class="space space-8"></div>
                                <div class="space space-8"></div>
                                <br>

                                <table id="simple-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th><a href="">#</a></th>
                                        <th><a href="">Category</a></th>
                                        <th><a href="">Sub Category</a></th>
                                        <th><a href="">Another Sub Category</a></th>
                                        <th><a href="">Product</a></th>
                                        <th><a href="">Url</a></th>
                                        <th><a href="">Actions</a></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            @php($url = $product->product)
                                            @php($array = explode("/", $url))
                                            <td>{{$array[1]}} </td>
                                            <td>{{$array[2]}} </td>
                                            <td>{{$array[3]}} </td>
                                            <td>{{$array[4]}} </td>
                                            <td>{{$product->product}} </td>
                                            <td>
                                                <div class="btn-group" style="width:100%;">
                                                    <a data-toggle="tooltip" class="btn btn-link btn-sm"
                                                       title="Edit News"
                                                       href="{{ route('products.edit', $product->id) }}"><i
                                                            class="fa fa-pencil"></i></a>

                                                    <form method="delete"
                                                          action="{{route('products.delete', $product->id)}} ">
                                                        @csrf
                                                        <button data-placement="left" data-toggle="tooltip"
                                                                title="Delete news" type="submit"
                                                                class="btn btn-link btn-sm"
                                                                onclick="return confirm('Do you want to delete this product?')">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                {!! $products->appends(\Request::except('page'))->render() !!}
                            </div><!-- /.span -->
                        </div><!-- /.row -->

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
@stop
