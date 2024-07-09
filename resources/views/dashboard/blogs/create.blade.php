<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>

    <!-- Core CSS - Include with every page -->
    <link href={{asset("backend/css/bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("backend/font-awesome/css/font-awesome.css")}} rel="stylesheet">

    <!-- Page-Level Plugin CSS - Forms -->

    <!-- SB Admin CSS - Include with every page -->
    <link href={{asset("backend/css/sb-admin.css")}} rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            @include('dashboard.layout.top_links')
            <!-- /.navbar-top-links -->
             
            @include('dashboard.layout.sidebar')
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create a Blog</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST" action="/blogs/create" enctype="multipart/form-data">
                                    @csrf
                                        
                                    <!-- <input type="text" name="user_id" value="1" readonly> -->

                                        <div class="form-group">
                                            <label>Blog Title</label>
                                            <input class="form-control" name="blog_title" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Content</label>
                                            <textarea class="form-control" rows="5" name="content" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Image</label>
                                            <input type="file" name="image">
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src={{asset("backend/js/jquery-1.10.2.js")}}></script>
    <script src={{asset("backend/js/bootstrap.min.js")}}></script>
    <script src={{asset("backend/js/plugins/metisMenu/jquery.metisMenu.js")}}></script>

    <!-- Page-Level Plugin Scripts - Forms -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src={{asset("backend/js/sb-admin.js")}}></script>

    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
