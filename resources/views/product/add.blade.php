@extends('layout.default')
@section('title', 'Add Product')
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
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}">Product</a>
                    </li>
                    <li class="active">Add</li>
                </ul><!-- /.breadcrumb -->


                <!-- /section:basics/content.searchbox -->
            </div>

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">
                <!-- #section:settings.box -->


                <!-- /section:settings.box -->
                <div class="page-header">
                    <h1>
                        Product
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Add
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form method="post" action="{{ route('products.store') }}" class="form-horizontal"
                              role="form">
                        @csrf
                        <!-- #section:elements.form -->

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category </label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="another_sub_category" required>
                                        <option value="">--Please Select Category--</option>
                                        @foreach($another_sub_category as $another_sub_cat)
                                        @php($url = $another_sub_cat->another_sub_category)
                                        @php($array = explode("/", $url))
                                            <option value="{{$another_sub_cat->id}}">{{$array[3]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product</label>

                                <div class="col-sm-9">
                                    <input name="name" type="text" id="form-field-1" placeholder="Product" class="col-xs-10 col-sm-5" required/>
                                </div>
                            </div>


                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Submit
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        Reset
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

@stop
