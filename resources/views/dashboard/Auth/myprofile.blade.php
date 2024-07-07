<div class="profile-card">
    <img src="{{ asset($user->profile_pic) }}" alt="Profile Picture" class="profile-img" style="width: 150px; height: 150px;">
    <h4>{{ $user->name }}</h4>
    <p>{{ $user->email }}</p>
    <p>Blogs Count: {{ $blogsCount }}</p>
    <p>User Type: {{ $user->is_admin ? 'Admin' : 'Writer' }}</p>
    <!-- Example social links -->
    <div class="mt-3">
        <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-default">Back to Dashboard</a>
    </div>
</div>