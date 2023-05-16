<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <img src="https://oldschool.runescape.wiki/images/thumb/Coins_detail.png/640px-Coins_detail.png?404bc" alt="{{ config('app.name') }} Logo" height="40">
            OSRS Profit Buddy
        </a>

        @include('layouts.navbar-links')

        @include('layouts.search')

        <!-- User Dropdown Menu -->
        @auth
        <div class="dropdown ms-3">
            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        @else
        <!-- Login Button -->
        <a href="{{ route('login') }}" class="btn btn-primary ms-3">Login</a>
        @endauth
    </div>
</nav>