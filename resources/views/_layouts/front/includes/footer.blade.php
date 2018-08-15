<div class="module-small bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="widget">
                    <h5 class="widget-title font-alt">Company news</h5>
                    <ul class="icon-list">
                        @foreach($_footer_latest_news as $item)
                            <li><a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h5 class="widget-title font-alt">Latest projects</h5>
                    <ul class="icon-list">
                        @foreach($_footer_latest_projects as $item)
                            <li><a href="{{ route('project.show', $item->id) }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h5 class="widget-title font-alt">Albums</h5>
                    <ul class="icon-list">
                        @foreach($_footer_latest_abouts as $item)
                            <li><a href="{{ route('about.show', $item->id) }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h5 class="widget-title font-alt">Quick Access</h5>
                    <ul class="icon-list">
                        <li><a href="{{ route('news.index') }}">Company news</a></li>
                        <li><a href="{{ route('scope_of_work.index') }}">Scope of Work</a></li>
                        <li><a href="{{ route('project.index') }}">Projects</a></li>
                        <li><a href="{{ route('album.index') }}">Albums</a></li>
                        <li><a href="{{ route('contact.show') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="divider-d">

<footer class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="copyright font-alt">&copy; {{ \Carbon\Carbon::now()->format('Y') }}&nbsp;<a href="index.html">SANIK GROUP</a>, All Rights Reserved</p>
            </div>
            <div class="col-sm-6">
                <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>