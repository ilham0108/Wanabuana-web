<div class="dropdown-title">Logged in 5 min ago</div>
<a href="/user/profile" class="dropdown-item has-icon">
    <i class="far fa-user"></i> Profile
</a>
<a href="features-activities.html" class="dropdown-item has-icon">
    <i class="fas fa-bolt"></i> Activities
</a>
<a href="features-settings.html" class="dropdown-item has-icon">
    <i class="fas fa-cog"></i> Settings
</a>
<div class="dropdown-divider"></div>
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
    </button>
</form>
