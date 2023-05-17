<!-- Navbar Links -->
<!-- <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('flip-finder') }}" class="nav-link {{ Request::is('flip-finder*') ? 'active' : '' }}">Flip Finder</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('profit-calcs') }}" class="nav-link {{ Request::is('profit-calcs*') ? 'active' : '' }}">Profit Calcs</a>
        </li>
    </ul>
</div> -->
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                    Home
                </a>
                <div class="sb-sidenav-menu-heading">Profit</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#marginCollapseLayouts" aria-expanded="false" aria-controls="marginCollapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-simple"></i></div>
                    Margins
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="marginCollapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('flip-finder') }}">Highest Profit Margins</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#calcCollapseLayouts" aria-expanded="false" aria-controls="calcCollapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                    Calculators
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="calcCollapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('profit-calcs') }}">Item Sets</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            @if (Auth::check())
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name }}
            @else
            <div class="small">Not logged in</div>
            @endif
        </div>
    </nav>
</div>