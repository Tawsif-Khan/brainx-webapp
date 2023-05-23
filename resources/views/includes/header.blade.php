<style>
   .has-submenu a{
    color: #000;
    border-bottom: #0B0D63;
   }

   .has-submenu a:active{
    color: #0B0D63;
   }
   .bar-icon span{
    background-color: #0B0D63;
   }
</style>
<!-- Header -->
<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
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
                    <i class="fas fa-times text-primary"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="submenu">
                    <a href="/">For Business </a>
                </li>
                <li class="submenu">
                    <a href="/talent">For AI Talent</a>
                </li> 
                <li class="has-submenu fade" style="width: 200px">
                </li>
                <li class="has-submenu fade" style="width: 100px">                                        
                </li>
            </ul>
        </div>		 
        <ul class="nav header-navbar-rht reg-head pe-5">
            @if (Auth::user() != null)
                @if(Auth::user()->role == 'Client')											
                <li><a href="{{ route('client.job.detail') }}" class="reg-btn"> Dashboard</a></li>
                @elseif(Auth::user()->role == 'Talent')		
                <li><a href="{{ route('build.profile') }}" class="reg-btn"> Dashboard</a></li>
                @else
                <li><a href="{{ route('admin.dashboard') }}" class="reg-btn"> Dashboard</a></li>
                @endif
            @endif

            @if (Auth::guard()->user() == null && Request::is('talent'))
            <li><a href="{{ url('auth/linkedin') }}" data-bs-toggle="modal" data-bs-target="#login-modal" class="log-btn"><img src="assets/img/icon/lock-icon.svg" class="me-2" alt="icon"> Login</a></li>
                
            @endif
            @if (Auth::guard()->user() == null && Request::is('/'))
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#client-signin" class="log-btn"><img src="assets/img/icon/lock-icon.svg" class="me-2" alt="icon"> Login</a></li>
                
            @endif
            {{-- <li><a href="post-project.html" class="login-btn">Post a Project </a></li> --}}
        </ul>
    </nav>
</header>
<!-- /Header -->