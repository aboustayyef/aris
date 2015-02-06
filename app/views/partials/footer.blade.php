<div class="inner">
    <div class="footerColumn">
        <h4>Footer Header</h4>
        <ul>
            <li><a href="">link 1</a></li>
            <li><a href="">link 2</a></li>
            <li><a href="">link 3</a></li>
            <li><a href="">link 4</a></li>
            <li><a href="">link 5</a></li>
        </ul>
    </div>
    <div class="footerColumn">
        <h4>Footer Header</h4>
        <ul>
            <li><a href="">link 1</a></li>
            <li><a href="">link 2</a></li>
            <li><a href="">link 3</a></li>
            <li><a href="">link 4</a></li>
            <li><a href="">link 5</a></li>
        </ul>
    </div>
    <div class="footerColumn">
        <h4>Footer Header</h4>
        <ul>
            <li><a href="">link 1</a></li>
            <li><a href="">link 2</a></li>
            <li><a href="">link 3</a></li>
            <li><a href="">link 4</a></li>
            <li><a href="">link 5</a></li>
        </ul>
    </div>
    <div>
        <a href="{{route('login')}}?return={{Request::path()}}">Admin Login</a>
    </div>
	<!-- Jquery, use CDN in production -->
	<script src="{{asset('js/jquery/jquery.min.js')}}"></script>

	<!-- external assets. Merge in production -->
	<script src="{{asset('js/flexslider/jquery.flexslider-min.js')}}"></script>
	<script src="{{asset('js/hoverintent/hoverintent.min.js')}}"></script>

	<script src="{{asset('js/aris-min.js')}}"></script>
	<!-- Don't forget analytics -->
</div>