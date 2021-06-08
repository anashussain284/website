<!-- #section:basics/sidebar -->
<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <!-- #section:basics/sidebar.layout.shortcuts -->
            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>

            <!-- /section:basics/sidebar.layout.shortcuts -->
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="<?php echo Request::is('/') ? 'active' : ''; ?>">
            <a href="{{ route('dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="<?php echo Request::is('category/*') || Request::is('category') ? 'active' : ''; ?>">
            <a href="{{ route('categories.index') }}">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">Category</span>
            </a>
        </li>

        <li class="<?php echo Request::is('sub-category/*') || Request::is('sub-category') ? 'active' : ''; ?>">
            <a href="{{ route('sub-categories.index') }}">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">Sub Category</span>
            </a>
        </li>

        <li class="<?php echo Request::is('another-sub-category/*') || Request::is('another-sub-category') ? 'active' : ''; ?>">
            <a href="{{ route('another-sub-categories.index')}}">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text">Ano Sub Category</span>
            </a>
        </li>

        <li class="<?php echo Request::is('product/*') || Request::is('product') ? 'active' : ''; ?>">
            <a href="{{ route('products.index') }}">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">Product</span>
            </a>
        </li>


    </ul><!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left"
           data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>

<!-- /section:basics/sidebar -->
