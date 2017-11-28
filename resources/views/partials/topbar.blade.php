<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           @lang('quickadmin.quickadmin_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           @lang('quickadmin.quickadmin_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <ul class="nav navbar-nav pull-right">

            <li class="user user-menu" style="margin-top: 10px; margin-right: 20px">
                <img class="user-image" src="{{ Auth::user()->hasMedia('avatars') ? Auth::user()->getFirstMediaUrl('avatars', 'resized') : '/images/avatar_placeholder.jpg'}}">
                <span class="hidden-xs" style="margin-left: 3px; color: white">{{ Auth::user()->name }}</span>
            </li>

        </ul>

    </nav>
</header>



