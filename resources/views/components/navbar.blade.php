<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a
        class="navbar-brand"
        href="#"
    >Navbar</a>
    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div
        class="collapse navbar-collapse"
        id="navbarNavDropdown"
    >
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a
                    class="nav-link"
                    href="#"
                >Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    href="#"
                >Features</a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    href="#"
                >Pricing</a>
            </li>
            @auth
            <li class="nav-item dropdown">
                <form
                    action="/logout"
                    method="POST"
                >
                    @csrf
                    <button
                        type="submit"
                        class="btn btn-danger"
                    >
                        Logout
                    </button>
                </form>
            </li>
            @else
            <li class="nav-item">
                <a
                    class="nav-link"
                    href="/login"
                >Login</a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    href="/register"
                >Register</a>
            </li>
            @endauth
        </ul>
    </div>
</nav>