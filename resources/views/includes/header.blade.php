<!-- Header -->
<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            
            <a href="/" class="navbar-brand logo">
                <img src="assets/img/BrainX_logo.png" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="/" class="menu-logo">
                    <img src="assets/img/BrainX_logo.png" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                
                {{-- <li class="has-submenu">
                    <a href="/business">For Business </a>
                    
                </li>
                <li class="has-submenu">
                    <a href="/">For Tech Talent</a>
                    
                </li> --}}
            </ul>
        </div>		 
        <ul class="nav header-navbar-rht reg-head pe-5">												
            {{-- <li><a href="register.html" class="reg-btn"><img src="assets/img/icon/reg-icon.svg" class="me-1" alt="icon"> Register</a></li> --}}
            @if (Auth::guard()->user() == null)
            <li><a href="{{ url('auth/linkedin') }}" class="log-btn"><img src="assets/img/icon/lock-icon.svg" class="me-1" alt="icon"> Login</a></li>
                
            @endif
            {{-- <li><a href="post-project.html" class="login-btn">Post a Project </a></li> --}}
        </ul>
    </nav>
</header>
<!-- /Header -->