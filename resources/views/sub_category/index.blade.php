@extends('layout.default')
@section('title', 'Sub-Category Index')
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

                    <li class="active">Sub-Category</li>
                </ul><!-- /.breadcrumb -->

                <!-- /section:basics/content.searchbox -->
            </div>

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">


                <!-- /section:settings.box -->
                <div class="page-header">
                    <h1>
                        Sub-Category
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            All Sub-Categories
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
                                    <a href="{{route('sub-categories.add')}} " class="btn btn-info btn-sm">Add New
                                        Sub-Category</a>
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
                                        <th><a href="">Url</a></th>
                                        <th><a href="">Actions</a></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($sub_categories as $sub_category)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            @php($url = $sub_category->sub_category)
                                            @php($array = explode("/", $url))
                                            <td>{{$array[1]}} </td>
                                            <td>{{$array[2]}} </td>
                                            <td>{{$sub_category->sub_category}} </td>
                                            <td>
                                                <div class="btn-group" style="width:100%;">
                                                    <a data-toggle="tooltip" class="btn btn-link btn-sm"
                                                       title="Edit News"
                                                       href="{{ route('sub-categories.edit', $sub_category->id) }}"><i
                                                            class="fa fa-pencil"></i></a>

                                                    <form method="delete"
                                                          action="{{route('sub-categories.delete', $sub_category->id)}} ">
                                                        @csrf
                                                        <button data-placement="left" data-toggle="tooltip"
                                                                title="Delete news" type="submit"
                                                                class="btn btn-link btn-sm"
                                                                onclick="return confirm('Do you want to delete this sub_category?')">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                {!! $sub_categories->appends(\Request::except('page'))->render() !!}
                            </div><!-- /.span -->
                        </div><!-- /.row -->

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
@stop
