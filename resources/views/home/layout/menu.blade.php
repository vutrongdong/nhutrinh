<nav class="container navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">
        <img src="home_assets/image/logo.png" alt="logo" style="width: 80px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            @foreach($categories_menu as $menu)
                <li class="nav-item dropdown">
                    <a class="nav-link text-uppercase" href="#">{{ $menu->title }}</a>
                    <div class="dropdown-content">
                        @foreach($menu->children as $children)
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-uppercase" href="#">{{ $children->title }}</a>
                        @endforeach
                    </div>
                </li>
            @endforeach
            <li class="nav-item dropdown">
                <a class="nav-link text-uppercase" href="#">{{ $categories_blog_menu->title }}</a>
                <div class="dropdown-content">
                    @foreach($categories_blog_menu->children as $children)
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-uppercase" href="#">{{ $children->title }}</a>
                    @endforeach
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>