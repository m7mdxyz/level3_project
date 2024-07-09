<div class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Blogs<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/blogs">Blogs</a>
                    </li>
                    <li>
                        <a href="/blogs/create">Create a Blog</a>
                    </li>
                    @if(auth()->check())
                        @if(auth()->user()->user_type_id == 1)
                            <li>
                                <a href="/blogs/publish">Publish Blogs</a>
                            </li>
                        @endif
                    @endif
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="/writers"><i class="fa fa-edit fa-fw"></i> Writers<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/blogs">Writers</a>
                    </li>
                    <li>
                        <a href="/writers/create">Create ... /</a>
                    </li>
                    <li>
                        <a href="/writers/edit">Edit ... ?</a>
                    </li>
            </li>
        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div>