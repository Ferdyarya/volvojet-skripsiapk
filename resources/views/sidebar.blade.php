<div data-active-color="white" data-background-color="black" data-image="{{ asset('assets/img/sidebar-bg/02.jpg') }}" class="app-sidebar">
    <div class="sidebar-header">
        <div class="logo clearfix">
            <a href="{{ 'home' }}" class="logo-text float-left">
                <div class="logo-img"><img src="{{ asset('assets/img/logo.png') }}" /></div><span class="text align-middle"></span>
            </a>
            <a class=" d-none d-sm-none d-md-none d-lg-block"></a>
        </div>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" class="navigation navigation-main">
                <li class=" nav-item"><a href="{{ 'home' }}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a></li></li>
                <li class="has-sub nav-item"><a href="#"><i class="ft-copy"></i><span data-i18n="" class="menu-title">Master Data</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('user.index') }}" class="menu-item">User</a></li>
                        <li><a href="{{ route('category.index')}}" class="menu-item">Category</a></li>
                        <li><a href="{{ route('masakan.index') }}" class="menu-item">Masakan</a></li>
                        <li><a href="{{ route('setting.index') }}" class="menu-item">Setting</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
