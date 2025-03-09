<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="/">TuMobilya<span>.</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                @foreach($menus as $menu)
                    <li class="nav-item"><a class="nav-link" href="{{ $menu->url }}">{{ $menu->title }}</a></li>
                @endforeach
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li class="nav-item">
                <li>
                    <a class="nav-link" href="{{ route('login') }}">
                        <img src="{{ asset('images/user.svg') }}" alt="User">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
