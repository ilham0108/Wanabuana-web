    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class=""><a class="nav-link" href="/"><i class="fas fa-eye"></i>
                <span>View Web</span></a>
        </li>
        <li class=""><a class="nav-link" href="{{ route('admin-galery.index') }}"><i class="far fa-images"></i>
                <span>Gallery</span></a>
        </li>
        <li class=""><a class="nav-link" href="{{ route('admin-post.index') }}"><i class="fas fa-pencil-alt"></i>
                <span>Post</span></a>
        </li>
        <li class=""><a class="nav-link" href="{{ route('member.index') }}"><i class="fas fa-users"></i>
                <span>Teams</span></a>
        </li>
        <li class=""><a class="nav-link" href="{{ route('admin-recruitment.index') }}"><i class="fas fa-user-clock"></i>
                <span>Recruitment</span></a>
        </li>
        <li class="menu-header">Configuration</li>
        <li class=""><a class="nav-link" href="{{ route('general-setting.index') }}"><i class="fas fa-cog"></i>
                <span>General Setting</span></a>
        </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="" class="btn btn-danger btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Logout
        </a>
    </div>
