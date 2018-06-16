<div class="module-small bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="widget">
                    <h5 class="widget-title font-alt">Company news</h5>
                    <ul class="icon-list">
                        @foreach($_footer_latest_news as $item)
                            <li><a href="#">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h5 class="widget-title font-alt">Latest projects</h5>
                    <ul class="icon-list">
                        @foreach($_footer_latest_projects as $item)
                            <li><a href="#">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h5 class="widget-title font-alt">Albums</h5>
                    <ul class="icon-list">
                        @foreach($_footer_latest_albums as $item)
                            <li><a href="#">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h5 class="widget-title font-alt">Quick Access</h5>
                    <ul class="icon-list">
                        <li><a href="#">Company news</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Albums</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
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
                <p class="copyright font-alt">&copy; {{ \Carbon\Carbon::now()->format('Y') }}&nbsp;<a href="index.html">SANIK-GROUp</a>, All Rights Reserved</p>
            </div>
            <div class="col-sm-6">
                <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>