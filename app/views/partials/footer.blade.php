<div class="inner" style="overflow:auto">
	<div style="float:left">
	    <div id="signature">
	        Al-Rayan International School, {{date('Y')}} &copy;
	    </div>
	    <div>
	        <a href="{{route('login')}}?return={{Request::path()}}">Admin Login</a>
	    </div>
    </div>
    <div style="float:right">
    	<a class="nounderline" href="https://web.facebook.com/ArisGhana/">
				<div class="findUsOnFacebook">
					Find Us On Facebook
				</div>
    	</a>
    </div>
	<!-- Jquery, use CDN in production -->
	<script src="{{asset('js/jquery/jquery.min.js')}}"></script>

	<!-- external assets. Merge in production -->
	<script src="{{asset('js/flexslider/jquery.flexslider-min.js')}}"></script>
	<script src="{{asset('js/hoverintent/hoverintent.min.js')}}"></script>

	<script src="{{asset('js/aris.min.js')}}"></script>

	<!-- Analytics -->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-61584501-1', 'auto');
	  ga('send', 'pageview');

	</script>


</div>
@yield('additionalScripts')
