<div class="header clearfix">
    <img src="{{ asset('images/logo.png') }}" alt="logo" class="float-left">
    <form action="{{ route('search') }}" method="POST" class="form-inline float-right">
        {{ csrf_field() }}
        <input class="form-control mr-sm-2" name="search_string" type="text" placeholder="Search a title or author" aria-label="Search">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    {{-- Using Request::is() method to give a menu element 'active' css class --}}
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('/') ? "active" : "" }}">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('c=*') ? "active" : "" }}">
                <a class="nav-link" href="{{ route('category', 'all') }}">Shop</a>
            </li>
            <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('news', 'news/*') ? "active" : "" }}">
                <a class="nav-link" href="{{ route('news.index') }}">News</a>
            </li>
            <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('about') ? "active" : "" }}">
                <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('contact') ? "active" : "" }}">
                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a href="{{ route('product.shoppingCart') }}" class="nav-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                    <span class="badge badge-danger">{{ session()->has('cart') ? session()->get('cart')->totalQty : '' }}</span></a>
            </li>
            {{--
             - Displaying Register and login buttons for guest users.
             - Shopping cart can be viewed by either guest or authorized users
             - Checking if user has a role of Administrator\Content Manager to display a dropdown with CRUD for different resources
             --}}
            @guest

            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> Register</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
            </li>
            @else
            @hasanyrole('Administrator|Content Manager')
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-secret" aria-hidden="true"></i> Admin Menu</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        @role('Administrator')
                        <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                        <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                        <a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a>
                        @endrole
                        <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Products</a>
                        <a class="dropdown-item" href="{{ route('articles.index') }}">Articles</a>
                    </div>
                </li>
            @endrole
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('users.profile') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
                @endguest
        </ul>
    </div>
</nav>

