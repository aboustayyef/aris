<div class="inner">
    <div id="signature">
        Alrayaan International School, {{date('Y')}}&copy;
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