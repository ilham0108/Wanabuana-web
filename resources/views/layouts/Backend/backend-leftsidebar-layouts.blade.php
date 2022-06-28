    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class=""><a class="nav-link" href="/"><i class="fas fa-eye"></i>
                <span>View Web</span></a></li>
        <li class=""><a class="nav-link" href="{{ route('galery.index') }}"><i
                    class="far fa-images"></i>
                <span>Gallery</span></a></li>
        <li class=""><a class="nav-link" href="{{ route('post.index') }}"><i
                    class="fas fa-pencil-alt"></i>
                <span>Post</span></a></li>
        <li class="menu-header">Configuration</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Manage</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('manage-about.index') }}">About</a></li>
                <li><a class="nav-link" href="{{ route('manage-image.index') }}">Image</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Galery</a></li>
                <li><a class="nav-link" href="layout-top-navigation.html"><i class="fas fa-pencil-alt"></i>
                        Post</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
            <ul class="dropdown-menu">
                <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                <li><a href="gmaps-marker.html">Marker</a></li>
                <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                <li><a href="gmaps-route.html">Route</a></li>
                <li><a href="gmaps-simple.html">Simple</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
            </ul>
        </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="" class="btn btn-danger btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Logout
        </a>
    </div>
