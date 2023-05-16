<!-- Navbar Links -->
<div class="collapse navbar-collapse" id="navbarNav">
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
</div>