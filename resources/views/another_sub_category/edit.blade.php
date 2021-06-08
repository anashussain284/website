@extends('layout.default')
@section('title', 'Edit Another Sub-Category')
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
                        <a href="{{ route('another-sub-categories.index') }}">Another Sub-Category</a>
                    </li>
                    <li class="active">Edit</li>
                </ul><!-- /.breadcrumb -->


                <!-- /section:basics/content.searchbox -->
            </div>

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">
                <!-- #section:settings.box -->


                <!-- /section:settings.box -->
                <div class="page-header">
                    <h1>
                        Another Sub-Category
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Edit
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form method="POST" action="{{ route('another-sub-categories.update') }}" class="form-horizontal"
                              role="form">
                        @csrf
                        <!-- #section:elements.form -->
                        <input type="hidden" value="{{$another_sub_category->id}}" name="id">

                        <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sub-Category </label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="sub_category" name="sub_category" required>
                                        <option value="">--Please Select Sub-Category--</option>
                                        @foreach($sub_categories as $sub_category)
                                        @php($url = $sub_category->sub_category)
                                        @php($array = explode("/", $url))
                                            <option value="{{$sub_category->id}}" <?php if ($sub_category->id == $another_sub_category->sub_category_id) {
    echo "selected";
}
?> >{{$array[2]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @php($url = $another_sub_category->another_sub_category)
                            @php($array = explode("/", $url))
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Another-Sub-Category</label>

                                <div class="col-sm-9">
                                    <input name="name" type="text" id="form-field-1" value="{{ $array[3] }}" placeholder="Another-Sub-Category" class="col-xs-10 col-sm-5" required/>
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
