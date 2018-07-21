<nav class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation" style="background-color: #3e3197 !important">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">SANIK GROUP</a>
        </div>

        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                @foreach($_header_front_menu as $menu)
                    <li class="dropdown">
                        <a class="{{ !empty($menu['sub']) ? 'dropdown-toggle': '' }}" data-toggle="{{ !empty($menu['sub']) ? 'dropdown': '' }}" href="{{ $menu['link'] }}">{{ $menu['title'] }}</a>
                        @if(!empty($menu['sub']))
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    @foreach($menu['sub'] as $sub)
                                        <a href="{{ $sub['link'] }}">{{ $sub['title'] }}</a>
                                    @endforeach
                                </li>
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
