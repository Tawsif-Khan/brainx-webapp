<!-- Header -->
<div class="header-blue pb-2">
			
    <!-- Logo -->
    <div class="header-left">
        <a href="/" class="navbar-brand logo ">
            <img src="assets/img/BrainX/BrainX_icon_White-removebg-preview.png" alt="Logo">
        </a>
        {{-- <a href="/" class="logo logo-small">
            <img src="assets/img/BrainX_logo.png" alt="Logo" width="30" height="30">
        </a> --}}
        <!-- Sidebar Toggle -->
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="feather-chevrons-left"></i>
        </a>
        <!-- /Sidebar Toggle -->
        
        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="feather-chevrons-left"></i>
        </a>
        <!-- /Mobile Menu Toggle -->
    </div>
    <!-- /Logo -->
    
    
    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link user-img" data-bs-toggle="modal" data-bs-target="#add-feedback">
                <img src="assets/img/BrainX/Feedback-button-on-navigation-bar.png" alt=""> 
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="" src="assets/img/profiles/avatar-02.jpg">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Brian Johnson</span> paid the invoice <span class="noti-title">#DF65485</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="" src="assets/img/profiles/avatar-03.jpg">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Marie Canales</span> has accepted your estimate <span class="noti-title">#GTR458789</span></p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <div class="avatar avatar-sm flex-shrink-0">
                                        <span class="avatar-title rounded-circle bg-primary-light"><i class="far fa-user"></i></span>
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">New user registered</span></p>
                                        <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="" src="assets/img/profiles/avatar-04.jpg">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Barbara Moore</span> declined the invoice <span class="noti-title">#RDW026896</span></p>
                                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <div class="avatar avatar-sm flex-shrink-0">
                                        <span class="avatar-title rounded-circle bg-info-light"><i class="far fa-comment"></i></span>
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">You have received a new message</span></p>
                                        <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->
        
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="assets/img/BrainX/Talent-profile-avatar.png" alt="">
                    <span class="status online"></span>
                </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/view-profile"><i data-feather="user" class="me-1"></i> Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-out" class="me-1"></i> Logout</a>
            </div>
        </li>
        <!-- /User Menu -->
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
    <!-- /Header Menu -->
    
</div>
<!-- /Header -->

@include('includes.feedback-modal')
