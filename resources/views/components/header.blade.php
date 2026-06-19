<header class="header">
    <div class="container-custom">
        <div class="header-logo">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo"
            >
        </div>

        <nav class="header-menu">
            <a href="#section1">
                {{ __('message.invitation') }}
            </a>

            <a href="#section2">
                {{ __('message.send_wish') }}
            </a>

            <a href="#section3">
                {{ __('message.guestbook') }}
            </a>
        </nav>

        <div class="header-language">
            <a href="{{ url('/lang/vi') }}">
                VI
            </a>

            <a href="{{ url('/lang/en') }}">
                EN
            </a>

            <a href="{{ url('/lang/zh') }}">
                ZH
            </a>
        </div>
    </div>
</header>