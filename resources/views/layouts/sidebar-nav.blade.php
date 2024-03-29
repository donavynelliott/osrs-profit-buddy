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
                        <a class="nav-link" href="{{ route('flip-finder.highest-profit-margin') }}">Highest Profit Margins</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#calcCollapseLayouts" aria-expanded="false" aria-controls="calcCollapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                    Calculators
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="calcCollapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('profit-calcs.item-sets') }}">Item Sets</a>
                        <a class="nav-link" href="{{ route('calcs.xp-calc') }}">XP Calculator</a>
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