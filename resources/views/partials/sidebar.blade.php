<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div>  {{ Request::is('dashboard') ? 'active' : '' }} --}}
                <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }} " href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ Route::is('slider.index') ? 'active' : '' }} " href="{{ route('slider.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
                    Slider Entry
                </a>
                <a class="nav-link collapsed {{ Route::is('directors.index','managment.index','strength.index','story.index','chooseUs','mission.index') ? '' : 'collapsed' }} "
                    href="#" data-bs-toggle="collapse" data-bs-target="#websiteLayouts" aria-expanded="{{ Route::is('directors.index','managment.index','strength.index','story.index','chooseUs','mission.index') ? 'true' : 'false' }} "
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fab fa-firefox-browser"></i></div>
                    About Us
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Route::is('directors.index','managment.index','slider.index','strength.index','story.index','chooseUs') ? 'show' : '' }} " id="websiteLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Route::is('chooseUs') ? 'active' : '' }}"
                            href="{{ route('chooseUs') }}">Why Choose Us</a>
                        <a class="nav-link {{ Route::is('Ceo.Director') ? 'active' : '' }}"
                            href="{{ route('Ceo.Director') }}">Managing Director’s Message</a>
                        <a class="nav-link {{ Route::is('story.index') ? 'active' : '' }}"
                            href="{{ route('story.index') }}">Our Story Entry</a>
                        <a class="nav-link {{ Route::is('strength.index') ? 'active' : '' }}"
                            href="{{ route('strength.index') }}">Our Strength Entry</a>
                        <a class="nav-link {{ Route::is('mission.index') ? 'active' : '' }}"
                            href="{{ route('mission.index') }}">Our Mission Vision and Values</a>
                        <a class="nav-link {{ Route::is('directors.index') ? 'active' : '' }}"
                            href="{{ route('directors.index') }}">Board of Director Entry</a>
                        <a class="nav-link {{ Route::is('managment.index') ? 'active' : '' }}"
                            href="{{ route('managment.index') }}">Managment Team Entry</a>
                    </nav>
                </div>
                <a class="nav-link collapsed {{ Route::is('project.index','gallery.index') ? '' : 'collapsed' }} "
                    href="#" data-bs-toggle="collapse" data-bs-target="#projectLayouts" aria-expanded="{{ Route::is('project.index','gallery.index') ? 'true' : 'false' }} "
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fab fa-product-hunt"></i></div>
                    Project Module
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Route::is('project.index','gallery.index') ? 'show' : '' }} " id="projectLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Route::is('project.index') ? 'active' : '' }}"
                            href="{{ route('project.index') }}">Project Entry</a>
                        <a class="nav-link {{ Route::is('gallery.index') ? 'active' : '' }}"
                            href="{{ route('gallery.index') }}">Project Gallery Entry</a>
                    </nav>
                </div>
                <a class="nav-link {{ Route::is('newsEvent.index') ? 'active' : '' }} " href="{{ route('newsEvent.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                    News & Events Entry
                </a>
                <!-- <a class="nav-link {{ Route::is('blogs.index') ? 'active' : '' }} " href="{{ route('blogs.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                    Blog Entry
                </a> -->
               @if (Auth::user()->username == 'admin')
                <a class="nav-link {{ Route::is('admin.registration') ? 'active' : '' }}"
                    href="{{ route('admin.registration') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                    Create User
                </a>
                @endif
                <a class="nav-link collapsed {{ Route::is('company.index','story.index','mission.index') ? '' : 'collapsed' }} "
                    href="#" data-bs-toggle="collapse" data-bs-target="#settingLayouts" aria-expanded="{{ Route::is('company.index','story.index','mission.index') ? 'true' : 'false' }} "
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Route::is('company.index','story.index','mission.index') ? 'show' : '' }} " id="settingLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Route::is('company.index') ? 'active' : '' }}"
                            href="{{ route('company.index') }}">Company Profile</a>



                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>

<style>
    .notification-badge {
        position: absolute;
        top: -5px;
        right: 10px;
        width: 20px;
        height: 20px;
        background-color: red;
        border-radius: 50%;
        color: white;
        font-size: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>