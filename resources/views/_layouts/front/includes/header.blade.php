<nav class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation" style="background-color: rgba(10, 10, 10, 0.9) !important">

    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Sanik-Group</a>
        </div>

        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                {{--<li ><a href="{{ route('home') }}">Home</a></li>--}}
                <li ><a href="{{ route('home') }}">News</a></li>
                <li ><a href="{{ route('home') }}">Projects</a></li>
                <li ><a href="{{ route('home') }}">Albums</a></li>
                <li ><a href="{{ route('about.show') }}">About</a></li>
                <li ><a href="{{ route('contact.show') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>