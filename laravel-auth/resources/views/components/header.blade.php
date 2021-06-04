<header>
    <nav>
            @guest
            <ul class="not-logged">
                <li>
                    <a href="{{ route('index') }}" class="btn">Home</a>
                </li>
                <li>
                    <a class="btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a class="btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            </ul>
            @else
            <h1>
                Hello {{ Auth::user()->name }}
            </h1>
            <ul class="logged">
                <li>
                    <a href="{{ route('index') }}" class="btn">Home</a>
                </li>
                <li>
                    <a class="btn" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            @endguest
    </nav>
</header>