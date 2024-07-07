<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>

    <!-- Core CSS - Include with every page -->
    <link href={{asset("backend/css/bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("backend/font-awesome/css/font-awesome.css")}} rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href={{asset("backend/css/plugins/dataTables/dataTables.bootstrap.css")}} rel="stylesheet">

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
                    <h1 class="page-header">Blogs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>is published?</th>
                                            <th>published at</th>
                                            <th>created at</th>
                                            <th>edit</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                @foreach ($blogs as $key=>$blog)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $blog->title }}</td>
                    <td>
                        @if($blog->is_published == 0)
                        <span style="background-color: red;color:white">غير منشور</span>
                        @else
                        <span style="background-color: green;color:white">تم النشر</span>
                        @endif
                        {{-- {{$blog->is_published }} --}}
                    </td>
                    <td>{{ $blog->published_at}}</td>
                    <td>{{ $blog->created_at}}</td>
                    <td>
                        <a href="/blogs/{{$blog->id}}/edit"
                            class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="/blogs/{{$blog->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src={{asset("backend/js/plugins/dataTables/jquery.dataTables.js")}}></script>
    <script src={{asset("backend/js/plugins/dataTables/dataTables.bootstrap.js")}}></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src={{asset("backend/js/sb-admin.js")}}></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
