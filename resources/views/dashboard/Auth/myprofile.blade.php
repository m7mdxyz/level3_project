@extends("dashboard.layout.app")
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">My Profile</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->

<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ asset($user->profile_pic) }}" alt="Profile Picture">
    <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p>{{ $user->email }}</p>
        <p>Blogs Count: {{ $blogsCount }}</p>
        <p>User Type: {{ $user->user_type_id == 1 ? 'Admin' : 'Writer' }}</p>
        <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary">Back to Dashboard</a>
    </div>
</div>


@endsection