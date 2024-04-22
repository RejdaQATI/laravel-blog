<style>
    .btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: hsl(250, 100%, 64%);
        color: #FFFFFF;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        margin: 0 5px; 
    }

    .btn:hover {
        background-color: hsl(234, 100%, 64%);
    }

    .nav-stripe {
        background-color: #f8f9fa; 
        padding: 10px 0; 
    }
</style>

<header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
    <div class="flex lg:justify-center lg:col-start-2"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav-stripe">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="btn nav-link"
                                >
                                    Dashboard
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a
                                    href="{{ route('login') }}"
                                    class="btn nav-link"
                                >
                                    Log in
                                </a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a
                                        href="{{ route('register') }}"
                                        class="btn nav-link"
                                    >
                                        Register
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
